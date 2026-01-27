<?php

namespace Controller;

use Foundation\FPersistentManager;
use Entity\ECreation;
use Controller\CUser;
use View\VSave;
use Utility\USession;
use Utility\UServer;
use Utility\UStartSmarty;
use Utility\USidebarContext;

class CSave
{
    // public static function save(): void
    // {
    //     //controlla se è loggato
    //     if (!CUser::isLogged()) {
    //         USession::getInstance();
    //         USession::setSessionElement('redirect', UServer::getValue('REQUEST_URI'));
            
    //         header('Location: ' . BASE_URL . '/login');
    //         exit;
    //     }

    //     //ricava l'id della creazione
    //     $creationId = (int)($_POST['creation_id'] ?? 0);
    //     if ($creationId <= 0) {
    //         header('Location: ' . BASE_URL . '/home');
    //         exit;
    //     }

    //     $pm = new FPersistentManager();
    //     $user = CUser::getLoggedUser();
    //     $creation = $pm->findById(ECreation::class, $creationId);

    //     if (!$creation) {
    //         header('Location: ' . BASE_URL . '/home');
    //         exit;
    //     }

    //     if ($user->getSavedCreations()->contains($creation)) {
    //         $user->removeSavedCreation($creation);   //se è già salvato lo rimuove
    //     } else {
    //         $user->addSavedCreation($creation);      //sennò lo salva
    //     }

    //     $pm->save($user);

    //     header('Location: ' . BASE_URL . '/creation/' . $creationId);
    //     exit;
    // }
    
    public static function save(): void
    {
        header('Content-Type: application/json');

        // controllo login, js gestisce il redirect
        if (!CUser::isLogged()) {
            echo json_encode([
                'success' => false,
                'error' => 'NOT_AUTHENTICATED'
            ]);
            return;
        }   //poi torna nella pagina della creazione perché viene settato il valore di redirect quando si entra nella home

        // lettura JSON
        $data = json_decode(file_get_contents('php://input'), true);
        $creationId = (int) ($data['creation_id'] ?? 0);

        if ($creationId <= 0) {
            echo json_encode([
                'success' => false,
                'error' => 'INVALID_CREATION_ID'
            ]);
            return;
        }

        $pm = new FPersistentManager();
        $user = CUser::getLoggedUser();
        $creation = $pm->findById(ECreation::class, $creationId);

        if (!$creation) {
            echo json_encode([
                'success' => false,
                'error' => 'CREATION_NOT_FOUND'
            ]);
            return;
        }

        // toggle salva / rimuovi
        if ($user->getSavedCreations()->contains($creation)) {
            $user->removeSavedCreation($creation);
            $saved = false;
        } else {
            $user->addSavedCreation($creation);
            $saved = true;
        }

        $pm->save($user);

        // conteggio aggiornato
        $saveCount = $creation->getSavedCount();

        echo json_encode([
            'success' => true,
            'saved' => $saved,
            'saveCount' => $saveCount
        ]);
    }

    public static function show(): void
    {
        if (!CUser::isLogged()) {
            USession::getInstance();
            USession::setSessionElement('redirect', UServer::getValue('REQUEST_URI'));
            
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $user = CUser::getLoggedUser();
        $pm = new FPersistentManager();

        // PAGINAZIONE
        $page = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $limit = 4;
        $offset = ($page - 1) * $limit;

        // conteggio totale salvati
        $totalSaves = $pm->countSavedCreations($user);
        $totalPages = (int) ceil($totalSaves / $limit);

        // recupero salvati paginati
        $saved = $pm->findSavedCreationsPaginated($user, $limit, $offset);

        $data = [];

        foreach ($saved as $creation) {
            $data[] = [
                'id' => $creation->getId(),
                'title' => $creation->getTitle(),
                'author' => $creation->getAuthor()->getUsername(),
                'image' => $creation->getImages()->first()?->getPath(),
                'likes' => $creation->getLikesCount(),
                'comments' => $creation->getCommentCount(),
                'saves' => $creation->getSavedCount()
            ];
        }

        $sidebar = USidebarContext::get();
            
        VSave::show($data, $page, $totalPages, $sidebar);
    }
}