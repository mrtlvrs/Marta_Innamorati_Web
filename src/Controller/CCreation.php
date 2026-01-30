<?php

namespace Controller;

use Foundation\FPersistentManager;
use Entity\EUser;
use Entity\ECreation;
use Entity\EComment;
use Entity\ELike;
use Entity\EImage;
use Entity\EYarn;
use Entity\EYarnWeight;
use Entity\ECrochet;
use Entity\ECategory;
use View\VCreation;
use Utility\UServer;
use Utility\USession;
use Utility\UHTTPMethods;
use Utility\USidebarContext;

class CCreation
{
    /**
     * Mostra la pagina della singola creazione
     */
    public static function show(int $id): void
    {
        if ($id <= 0) {
            header('Location:' . BASE_URL .'/home');
            exit;
        }

        $pm = new FPersistentManager();

        $creation = $pm->findCreationById($id);

        if (!$creation) {
            header('Location:' . BASE_URL .'/home');
            exit;
        }

        $images = [];

        foreach ($creation->getImages() as $img) {
            $images[] = [
                'id'       => $img->getId(),
                'path'     => $img->getPath(),
                'position' => $img->getPosition(),
            ];
        }

        $loggedUser = CUser::getLoggedUser();

        $isLiked = false;
        $isSaved = false;

        if ($loggedUser) {
            //verifica se l'utente loggato ha messo like alla creazione
            $like = $pm->findOneBy(ELike::class, ['user' => $loggedUser, 'creation' => $creation]);
            $isLiked = ($like !== null);
            
            //verifica se l'utente loggato ha salvato la creazione
            if ($loggedUser) {
                $isSaved = $creation->getSavedBy()->contains($loggedUser);
            }
        }
        
        $loggedUserId = $loggedUser ? $loggedUser->getId() : null;
        $creationAuthorId = $creation->getAuthor()->getId();

        $limit = 4;
        $comments = [];

        foreach ($pm->findCommentsByCreation($creation, $limit, 0) as $comment){
            $commentAuthor = $comment->getAuthor()->getUsername();
            $commentAuthorId = $comment->getAuthor()->getId();

            $canDeleteComment = $loggedUserId === $commentAuthorId || $loggedUserId === $creationAuthorId;

            $comments[] = [
                'id' => $comment->getId(),
                'author' => $commentAuthor,
                'text' => $comment->getText(),
                'date' => $comment->getCreatedAt()->format('d/m/Y'),
                'canDelete' => $canDeleteComment,
            ];
        }

        //materiali
        $yarn = [
            'name' => $creation->getYarn()->getName()
        ];

        $yarnWeight = [
            'weight' => $creation->getYarnWeight()->getWeight()
        ];

        $crochet = [
            'size' => $creation->getCrochet()->getSize()
        ];

        $category = [
            'name' => $creation->getCategory()->getName()
        ];    

        $creationDate = $creation->getCreatedAt()->format('d M Y');
        $updateDate = '';
        if($creation->getUpdatedAt() !== null) {
            $updateDate = $creation->getUpdatedAt()->format('d M Y');
        }

        $data = [
            //'creation' > $creation,
            'creationId' => $creation->getId(),
            'author' => $creation->getAuthor()->getUsername(),
            'title' => $creation->getTitle(),
            'description' => $creation->getDescription(),
            'accessories' => $creation->getAccessories(),

            'images' => $images,
            'hasImages' => count($images) > 0,                      //per separare la logica della visualizzazione (nel .tpl)

            'yarn'          => $yarn,
            'yarnWeight'    => $yarnWeight,
            'crochet'       => $crochet,
            'category'      => $category,

            'likesCount' => $creation->getLikesCount(),
            'commentsCount' => $creation->getCommentCount(),
            'comments' => $comments,
            'hasComments' => $creation->getCommentCount() > 0,
            'isLiked' => $isLiked,
            'isSaved' => $isSaved,
            'savedCount' => $creation->getSavedCount(),

            'creationDate' => $creationDate,
            'updateDate' => $updateDate,
            'isUpdated' => $creationDate!==$updateDate && $updateDate !== '',
        ];

        USession::getInstance();

        // Assicura che la sessione sia inizializzata
        // Se non esiste (prima interazione dell'utente) la inizializza
        if ($loggedUserId != $creationAuthorId)
        {
            USession::setSessionElement('lastCreationId', $creation->getId());  //salva l'ultima creazione vista dall'utente in sessione
        }

        USession::setSessionElement('redirect', UServer::getValue('REQUEST_URI'));      //salva l'ultima pagina visitata per redirect (qui serve se l'utente prova a commentare o mette like)

        //SIDEBAR
        $sidebar = USidebarContext::get();

        VCreation::show($data, $sidebar);
    }


    //metodo per caricare ulteriori commenti
    public static function loadMoreComments(): void
    {
        //recupero parametri GET, se esiste usa il suo valore, altrimenti 0 (id non valido)
        $creationId = isset($_GET['creation']) ? (int) $_GET['creation'] : 0;   //id della creazione che l'utente sta visualizzando
        $offset = isset($_GET['offset']) ? (int) $_GET['offset'] : 0;           //quante volte ha premuto su carica altri

        //validazione minima
        if ($creationId <= 0 || $offset < 0) {
            http_response_code(400);
            return;
        }

        $pm = new FPersistentManager();

        //recupero della creazione dal db
        $creation = $pm->findCreationById($creationId);
        if ($creation === null) {
            http_response_code(404);
            return;
        }

        //numero di commenti da caricare per volta
        $limit = 5;

        //recupero commenti paginati
        $comments = $pm->findCommentsByCreation($creation, $limit, $offset);

        //preparazione dati per la view
        $commentsData = [];

        //la sessione è inizializzata per forza poiché lo fa quando l'utente entra in una creazione
        USession::getInstance();
        $user = USession::getSessionElement('user_id');

        foreach ($comments as $comment) {
            $author = $comment->getAuthor();

            $commentsData[] = [
                'id' => $comment->getId(),
                'author' => $author,
                'text' => $comment->getText(),
                'date' => $comment->getCreatedAt()->format('d/m/Y'),
                'canDelete' => $user !== null &&
                               ($user === $author->getId() || $user === $creation->getAuthor()->getId())
            ];
        }

        //rendering della view parziale
        VCreation::comments($commentsData);
    }




    //prepara il form per la pubblicazione della creazione
    public static function new(): void
    {
        //protezione
        if (!CUser::isLogged()) {
            header('Location:' . BASE_URL . '/login');
            exit;
        }

        $pm = new FPersistentManager();

        //recupero entità
        $yarns       = $pm->findAllYarns();
        $yarnWeights = $pm->findAllYarnWeights();
        $crochets    = $pm->findAllCrochets();
        $categories  = $pm->findAllCategories();

        //trasformazione in array semplici
        $yarnsData = [];
        foreach ($yarns as $yarn) {
            $yarnsData[] = [
                'id'   => $yarn->getId(),
                'name' => $yarn->getName()
            ];
        }

        $yarnWeightsData = [];
        foreach ($yarnWeights as $weight) {
            $yarnWeightsData[] = [
                'id'    => $weight->getId(),
                'weight' => $weight->getWeight()
            ];
        }

        $crochetsData = [];
        foreach ($crochets as $crochet) {
            $crochetsData[] = [
                'id'   => $crochet->getId(),
                'size' => $crochet->getSize()
            ];
        }

        $categoriesData = [];
        foreach ($categories as $category) {
            $categoriesData[] = [
                'id'   => $category->getId(),
                'name' => $category->getName()
            ];
        }

        $sidebar = USidebarContext::get();

        //passo i dati alla view
        $data = [
            'yarns'       => $yarnsData,
            'yarnWeights' => $yarnWeightsData,
            'crochets'    => $crochetsData,
            'categories'  => $categoriesData
        ];

        VCreation::new($data, $sidebar);
    }



    //quando l'utente salva la creazione viene richiamata questa funzione
    //poi viene reindirizzato alla pagina della creazione
    public static function save() : void
    {
        //protezione per un utenti non loggati
        if (!CUser::isLogged()) {
            header('Location:' . BASE_URL .'/login');
            exit;
        }

        if (UServer::getRequestMethod() !== 'POST') {
            header('Location:' . BASE_URL .'/home');
            exit;
        }

        //ricavo tutti i parametri dal form
        $title = trim(UHTTPMethods::post('title'));
        $description = trim(UHTTPMethods::post('description'));

        $yarnId       = (int) UHTTPMethods::post('yarn_id');
        $yarnWeightId = (int) UHTTPMethods::post('yarn_weight_id');
        $crochetId    = (int) UHTTPMethods::post('crochet_id');
        $categoryId   = (int) UHTTPMethods::post('category_id');
        $accessories  = trim(UHTTPMethods::post('accessories') ?? '');

        //verifico se sono state fornite tutte le info
        if (
            $title === '' ||
            $description === '' ||
            $yarnId <= 0 ||
            $yarnWeightId <= 0 ||
            $crochetId <= 0 ||
            $categoryId <= 0
        ) {
            VCreation::new('Compila tutti i campi');
            return;
        }

        $user = CUser::getLoggedUser();

        $creation = new ECreation($title, $description);
        $creation->setAuthor($user);

        $pm = new FPersistentManager();

        //gestione materiali
        $yarn = $pm->findById(EYarn::class, $yarnId);
        $yarnWeight = $pm->findById(EYarnWeight::class, $yarnWeightId);
        $crochet = $pm->findById(ECrochet::class, $crochetId);
        $category = $pm->findById(ECategory::class, $categoryId);

        if (!$yarn || !$yarnWeight || !$crochet || !$category) {
            VCreation::new(['error' => 'Selezione non valida']);
            return;
        }

        $creation->setYarn($yarn);
        $creation->setYarnWeight($yarnWeight);
        $creation->setCrochet($crochet);
        $creation->setCategory($category);

        if ($accessories !== '') {
            $creation->setAccessories($accessories);
        }


        $pm->save($creation);

        //upload di immagini come path
        $uploadBase = __DIR__ . '/../../public/uploads/creations';      //percorso cartella immagini creazioni
        $creationDir = $uploadBase . '/' . $creation->getId();          //una cartella per ogni creazione

        if (!is_dir($creationDir)) {            //crea la cartella se non esiste
            mkdir($creationDir, 0755, true);    //0755: permessi web standard
        }

        $files = $_FILES['images'] ?? null;     //recuper file caricati, corrisponde a <input type="file" name="images[]" multiple>

        if ($files && is_array($files['tmp_name'])) {               //tmp_name: path temporaneo sul server
            foreach ($files['tmp_name'] as $index => $tmpPath) {

                if ($tmpPath === '' || !is_uploaded_file($tmpPath)) {   //verifica che sia un vero upload
                    continue;
                }

                $extension = pathinfo($files['name'][$index], PATHINFO_EXTENSION);  //ricava l'estensione
                $filename  = 'img_' . $index . '.' . $extension;                    //costruisce il nome del file

                $relativePath = 'uploads/creations/' . $creation->getId() . '/' . $filename;
                $absolutePath = $creationDir . '/' . $filename;

                move_uploaded_file($tmpPath, $absolutePath);            //lo sposta in una cartella permanente

                $image = new EImage();              //crea l'immagine
                $image->setCreation($creation);
                $image->setPath($relativePath);
                $image->setPosition($index);

                $pm->save($image);
            }
        }

        $pm->save($creation);
        
        header('Location:' . BASE_URL . '/creation/' . $creation->getId());
        exit;
    }


    public static function edit(int $id): void
    {
        //controllo se l'utente è loggato
        if (!CUser::isLogged()) {
            header('Location:' . BASE_URL . '/login');
            exit;
        }

        if ($id <= 0) {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        $pm = new FPersistentManager();
        $creation = $pm->findCreationById($id);

        if (!$creation) {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        $user = CUser::getLoggedUser();

        //controllo se l'utente è l'autore della creazione
        if ($creation->getAuthor()->getId() !== $user->getId()) {
            header('Location:' . BASE_URL . '/creation/' . $id);
            exit;
        }

        $yarns       = $pm->findAllYarns();
        $yarnWeights = $pm->findAllYarnWeights();
        $crochets    = $pm->findAllCrochets();
        $categories  = $pm->findAllCategories();

        //recupero dal db tutti i materiali
        $yarnsData = [];
        foreach ($yarns as $yarn) {
            $yarnsData[] = [
                'id'   => $yarn->getId(),
                'name' => $yarn->getName()
            ];
        }

        $yarnWeightsData = [];
        foreach ($yarnWeights as $weight) {
            $yarnWeightsData[] = [
                'id'    => $weight->getId(),
                'weight' => $weight->getWeight()
            ];
        }

        $crochetsData = [];
        foreach ($crochets as $crochet) {
            $crochetsData[] = [
                'id'   => $crochet->getId(),
                'size' => $crochet->getSize()
            ];
        }

        $categoriesData = [];
        foreach ($categories as $category) {
            $categoriesData[] = [
                'id'   => $category->getId(),
                'name' => $category->getName()
            ];
        }

        //recupero dati della creazione per precompilare i form
        $data = [
            'isEdit' => true,
            'creationId' => $creation->getId(),
            'title' => $creation->getTitle(),
            'description' => $creation->getDescription(),

            'selectedYarn' => $creation->getYarn()->getId(),
            'selectedYarnWeight' => $creation->getYarnWeight()->getId(),
            'selectedCrochet' => $creation->getCrochet()->getId(),
            'selectedCategory' => $creation->getCategory()->getId(),

            'yarns'       => $yarnsData,
            'yarnWeights' => $yarnWeightsData,
            'crochets'    => $crochetsData,
            'categories'  => $categoriesData
        ];

        $sidebar = USidebarContext::get();

        VCreation::edit($data, $sidebar);
    }


    //aggiorna una creazione modificata
    public static function update(int $id): void
    {
        //verifica se l'utente è loggato
        if (!CUser::isLogged()) {
            header('Location:' . BASE_URL . '/login');
            exit;
        }

        if (UServer::getRequestMethod() !== 'POST') {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        $pm = new FPersistentManager();
        $creation = $pm->findCreationById($id);

        if (!$creation) {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        $user = CUser::getLoggedUser();

        //verifica se l'utente è l'autore della creazione
        if ($creation->getAuthor()->getId() !== $user->getId()) {
            header('Location:' . BASE_URL . '/creation/' . $id);
            exit;
        }

        // dati dal form
        $title       = trim(UHTTPMethods::post('title'));
        $description = trim(UHTTPMethods::post('description'));

        $yarnId       = (int) UHTTPMethods::post('yarn_id');
        $yarnWeightId = (int) UHTTPMethods::post('yarn_weight_id');
        $crochetId    = (int) UHTTPMethods::post('crochet_id');
        $categoryId   = (int) UHTTPMethods::post('category_id');

        if (
            $title === '' ||
            $description === '' ||
            $yarnId <= 0 ||
            $yarnWeightId <= 0 ||
            $crochetId <= 0 ||
            $categoryId <= 0
        ) {
            VCreation::edit(['error' => 'Compila tutti i campi']);
            return;
        }

        // recupero entità
        $yarn       = $pm->findById(EYarn::class, $yarnId);
        $yarnWeight = $pm->findById(EYarnWeight::class, $yarnWeightId);
        $crochet    = $pm->findById(ECrochet::class, $crochetId);
        $category   = $pm->findById(ECategory::class, $categoryId);

        if (!$yarn || !$yarnWeight || !$crochet || !$category) {
            VCreation::edit(['error' => 'Selezione non valida']);
            return;
        }

        // aggiornamento
        $creation->setTitle($title);
        $creation->setDescription($description);
        $creation->setYarn($yarn);
        $creation->setYarnWeight($yarnWeight);
        $creation->setCrochet($crochet);
        $creation->setCategory($category);
        $creation->setUpdatedAt(new \DateTime());

        $pm->save($creation);

        header('Location:' . BASE_URL . '/creation/' . $creation->getId());
        exit;
    }

    //elimina una creazione
    public static function delete(int $id): void
    {
        // utente deve essere loggato
        if (!CUser::isLogged()) {
            header('Location:' . BASE_URL . '/login');
            exit;
        }

        if ($id <= 0) {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        $pm = new FPersistentManager();
        $creation = $pm->findCreationById($id);

        if (!$creation) {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        $user = CUser::getLoggedUser();

        // solo l'autore può eliminare
        if ($creation->getAuthor()->getId() !== $user->getId()) {
            header('Location:' . BASE_URL . '/creation/' . $id);
            exit;
        }

        // elimina cartella immagini
        $creationDir = __DIR__ . '/../../public/uploads/creations/' . $creation->getId();

        if (is_dir($creationDir)) {
            foreach (scandir($creationDir) as $item) {
                if ($item === '.' || $item === '..') continue;

                $path = $creationDir . '/' . $item;

                if (is_dir($path)) {
                    // se per caso in futuro ci finiscono sottocartelle
                    array_map('unlink', glob($path . '/*'));
                    rmdir($path);
                } else {
                    unlink($path);
                }
            }

            rmdir($creationDir);
        }

        // elimina dal database
        $pm->remove($creation);

        header('Location:' . BASE_URL . '/profile');
        exit;
    }
}
