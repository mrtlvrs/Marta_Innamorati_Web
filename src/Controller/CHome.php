<?php

namespace Controller;

use Foundation\FPersistentManager;
use Entity\ECreation;
use Entity\ECategory;
use Entity\ECrochet;
use Entity\EYarn;
use Entity\EYarnWeight;
use Entity\EUser;
use Utility\USession;
use Utility\USidebarContext;
use View\VHome;

class CHome
{
    /**
     * Mostra la home con l’elenco delle creazioni
     * i filtri non sono una pagina a parte, ma uno stato della lista di creazioni
     */
    public static function showHome(string $mode = 'latest'): void
    {
        /*
        * GESTIONE DEI FILTRI + GESTIONE COOKIE
        * CHome riceve solo gli ID dei filtri applicati
        * li trasforma in Entity
        * passa le Entity al pm
        */
        $isReset = isset($_GET['reset']) && $_GET['reset'] == 1;

        if ($isReset) {
            USession::getInstance();

            //se l'utente clicca reset i filtri vengono eliminati
            USession::unsetSessionElement('category');
            USession::unsetSessionElement('yarn');
            USession::unsetSessionElement('yarnWeight');
            USession::unsetSessionElement('crochet');

            $appliedFilters = [];
            $selectedFilters = [];
        }
        else {
            //filtri applicati (influiscono sulla query) SOLO se arrivano esplicitamente dalla richiesta
            $appliedFilters = $_GET ?? [];
        
            if (!empty($appliedFilters))
            {
                USession::getInstance();        //crea la sessione se non esiste
                foreach ($appliedFilters as $filter => $value) {
                    USession::setSessionElement($filter, $value);
                }
                
            }

            //filtri selezionati (solo UI): se non ci sono filtri in GET, prova a recuperarli dal cookie
            $selectedFilters = $appliedFilters;


            // if (empty($selectedFilters)) {
            //     $contextName = UCookie::getContextName();
            //     $context = UCookie::get($contextName);
            //     if (!empty($context['filters']) && is_array($context['filters'])) {
            //         $selectedFilters = $context['filters'];
            //     }
            // }

            //se l'utente non ha inviato i filtri, li prova a recuperare dalla sessione attiva
            if (empty($selectedFilters)) {
                if (USession::getSessionStatus() == true)  {
                    USession::getInstance();
                    $selectedFilters["category"] = USession::getSessionElement("category");
                    $selectedFilters['yarn'] = USession::getSessionElement('yarn');
                    $selectedFilters['yarnWeight'] = USession::getSessionElement('yarnWeight');
                    $selectedFilters['crochet'] = USession::getSessionElement('crochet');
                }
            }
        }
  
        //salva i filtri nel cookie solo se arrivano esplicitamente dalla richiesta
        // if (!empty($appliedFilters)) {
        //     $contextName = UCookie::getContextName();
        //     UCookie::update($contextName, ['filters' => $appliedFilters]);      
        // }
        
        $pm = new FPersistentManager();

        $filterEntities = [];

        //categoria
        if (!empty($appliedFilters['category'])) {
            $filterEntities['category'] = $pm->findById(ECategory::class, (int)$appliedFilters['category']);
        }

        //filato
        if (!empty($appliedFilters['yarn'])) {
            $filterEntities['yarn'] = $pm->findById(EYarn::class, (int)$appliedFilters['yarn']);
        }

        //spessore filato
        if (!empty($appliedFilters['yarnWeight'])) {
            $filterEntities['yarnWeight'] = $pm->findById(EYarnWeight::class,(int)$appliedFilters['yarnWeight']);
        }

        //uncinetto
        if (!empty($appliedFilters['crochet'])) {
            $filterEntities['crochet'] = $pm->findById(ECrochet::class, (int)$appliedFilters['crochet']);
        }

        //se l'utente è loggato lo salva in context user
        $user = CUser::isLogged() ? CUser::getLoggedUser() : null;

        //contextUser contiene l'utente solo se è loggato e solo se è in Per te
        if ($mode === 'following') {
            $contextUser = $user;
        } else {
            $contextUser = null;
        }

        //PAGINAZIONE
        $page = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;    //verifica in che pagina siamo
        $limit = 4;
        $offset = ($page - 1) * $limit;

        //conteggio totale per il numero di pagine
        $totalCreations = $pm->countCreationsByFilters($filterEntities, $contextUser);
        $totalPages = (int) ceil($totalCreations / $limit);


        //in base alla modalità richiama il metodo adatto per ottenere le creazioni
        $creations = $pm->findLatestCreationsByFilters($filterEntities, $limit, $offset, $contextUser);

        $categories = $pm->findAllCategories();
        $yarns = $pm->findAllYarns();
        $yarnWeights = $pm->findAllYarnWeights();
        $crochets = $pm->findAllCrochets();

        //VISUALIZZAZIONE DELLE CREAZIONI
        $data = [];

        foreach ($creations as $creation) {

            // prima immagine (se esiste)
            $firstImage = null;
            if ($creation->getImages()->count() > 0) {
                $firstImage = $creation->getImages()->first()->getPath();
            }

            //verifica se l'utente ha salvato la creazione (per mostrare il bollino)
            $isSaved = false;
            if ($user) {
                $isSaved = $user->getSavedCreations()->contains($creation);
            }

            $data[] = [
                'id' => $creation->getId(),
                'title' => $creation->getTitle(),
                'author' => $creation->getAuthor()->getUsername(),
                'firstImage'=> $firstImage,
                'likesCount' => $creation->getLikesCount(),
                'commentsCount' => $creation->getCommentCount(),
                'savedCount' => $creation->getSavedCount(),
                'isSaved' => $isSaved
            ];
        }

        //SIDEBAR
        $sidebar = USidebarContext::get();

        VHome::showHome($data, $mode, $categories, $yarns, $yarnWeights, $crochets, $selectedFilters, $page, $totalPages, $sidebar);
    }
}