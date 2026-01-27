<?php

namespace Controller;

use Entity\ECreation;
use Entity\EComment;
use Entity\EUser;
use Entity\ECategory;
use Entity\ECrochet;
use Entity\EYarn;
use Entity\EYarnWeight;
use Foundation\FPersistentManager;
use Utility\USession;
use Utility\UHTTPMethods;
use View\VAdmin;

class CAdmin {
    //protezione accesso
    public static function requireAdmin(): void
    {
        USession::getInstance();        //la sessione serve a riconoscere l'utente

        if (!USession::isSetSessionElement('user_id')) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        //recupero utente
        $pm = new FPersistentManager();
        $user = $pm->findById(EUser::class, USession::getSessionElement('user_id'));

        //se l'utente non esiste (utente eliminato dall'admin) distrugge la sessione
        if (!$user) {
            USession::destroySession();
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        //controllo ruolo
        if ($user->getRole() !== 'ROLE_ADMIN') {
            header('HTTP/1.1 403 Forbidden');
            exit('Accesso negato');
        }
    }



    //CREAZIONI

    //visualizzazione lista di creazioni
    public static function manageContents(): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $creations = $pm->findAllCreations();

        $isAdmin = true;        //lo verifica in requireAdmin, serve per la side bar

        VAdmin::manageContents($creations, $isAdmin);
    }


    //visualizza la creazione nel dettaglio
    public static function viewCreation(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $creation = $pm->findCreationById($id);

        if (!$creation) {
            header('HTTP/1.1 404 Not Found');
            exit('Creazione non trovata');
        }

        $isAdmin = true;

        VAdmin::viewCreation($creation, $isAdmin);
    }

    //eliminazione di una creazione
    public static function deleteCreation(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $creation = $pm->findCreationById($id);

        if (!$creation) {
            header('HTTP/1.1 404 Not Found');
            exit('Creazione non trovata');
        }

        // elimina cartella immagini della creazione
        $creationDir = __DIR__ . '/../../public/uploads/creations/' . $creation->getId();

        if (is_dir($creationDir)) {
            foreach (scandir($creationDir) as $item) {
                if ($item === '.' || $item === '..') continue;

                $path = $creationDir . '/' . $item;

                if (is_dir($path)) {
                    foreach (scandir($path) as $sub) {
                        if ($sub === '.' || $sub === '..') continue;
                        unlink($path . '/' . $sub);
                    }
                    rmdir($path);
                } else {
                    unlink($path);
                }
            }
            rmdir($creationDir);
        }

        // elimina dal database
        $pm->remove($creation);

        header('Location:' . BASE_URL . '/adminContents');
        exit;
    }
    
    //eliminazione commento, riceve creationId per reindirizzare l'admin nel dettaglio della creazione
    public static function deleteComment(int $commentId, int $creationId): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $comment = $pm->findById(EComment::class, $commentId);

        if (!$comment) {
            header('HTTP/1.1 404 Not Found');
            exit('Commento non trovato');
        }

        $pm->remove($comment);

        header('Location:' . BASE_URL . '/adminContents/' . $creationId);
        exit;
    }


    //UTENTI

    // lista utenti
    public static function manageUsers(): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $users = $pm->findAllUsers(EUser::class);

        $isAdmin = true;

        VAdmin::manageUsers($users, $isAdmin);
    }

    // dettaglio utente
    public static function viewUser(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $user = $pm->findById(EUser::class, $id);

        if (!$user) {
            header('HTTP/1.1 404 Not Found');
            exit('Utente non trovato');
        }

        $isAdmin = true;

        VAdmin::viewUser($user, $isAdmin);
    }

    // eliminazione utente
    public static function deleteUser(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $user = $pm->findById(EUser::class, $id);

        if (!$user) {
            header('HTTP/1.1 404 Not Found');
            exit('Utente non trovato');
        }

        // evita auto-eliminazione admin
        if ($user->getId() === USession::getSessionElement('user_id')) {
            header('HTTP/1.1 400 Bad Request');
            exit('Non puoi eliminare il tuo account admin');
        }

        //pulizia filesystem per ogni creazione
        foreach ($user->getCreations() as $creation) {
            $creationDir = __DIR__ . '/../../public/uploads/creations/' . $creation->getId();

            if (is_dir($creationDir)) {
                foreach (scandir($creationDir) as $item) {
                    if ($item === '.' || $item === '..') continue;

                    $path = $creationDir . '/' . $item;

                    if (is_dir($path)) {
                        array_map('unlink', glob($path . '/*'));
                        rmdir($path);
                    } else {
                        unlink($path);
                    }
                }
                rmdir($creationDir);
            }
        }

        // ora Doctrine può eliminare tutto
        $pm->remove($user);

        header('Location:' . BASE_URL . '/adminUsers');
        exit;
    }



    //MATERIALI
    public static function manageMaterials(): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();

        $categories = $pm->findAllCategoriesIncludingInactive(ECategory::class);
        $yarns      = $pm->findAllYarnsIncludingInactive(EYarn::class, false);
        $weights    = $pm->findAllYarnWeightsIncludingInactive(EYarnWeight::class);
        $crochets   = $pm->findAllCrochetsIncludingInactive(ECrochet::class);

        $isAdmin = true;

        VAdmin::manageMaterials($categories, $yarns, $weights, $crochets, $isAdmin);
    }

    //gestione categorie
    public static function addCategory(): void
    {
        self::requireAdmin();

        $name = trim(UHTTPMethods::post('name'));

        if ($name === '') {
            http_response_code(400);
            exit('Nome categoria non valido');
        }

        $category = new ECategory($name);
        //$category->setName($name);

        $pm = new FPersistentManager();
        $pm->save($category);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function updateCategory(int $id): void
    {
        self::requireAdmin();

        $name = trim(UHTTPMethods::post('name'));

        if ($name === '') {
            http_response_code(400);
            exit('Nome categoria non valido');
        }

        $pm = new FPersistentManager();
        $category = $pm->findById(ECategory::class, $id);

        if (!$category) {
            http_response_code(404);
            exit('Categoria non trovata');
        }

        $category->setName($name);
        $pm->save($category);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function toggleCategory(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $category = $pm->findById(ECategory::class, $id);

        if (!$category) {
            http_response_code(404);
            exit('Categoria non trovata');
        }

        if ($category->isActive()) {
            $category->deactivate();
        }
        else {
            $category->activate();
        }

        $pm->save($category);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    //gestione filati
    public static function addYarn(): void
    {
        self::requireAdmin();

        $name = trim(UHTTPMethods::post('name'));

        if ($name === '') {
            http_response_code(400);
            exit('Nome filato non valido');
        }

        $yarn = new EYarn($name);

        $pm = new FPersistentManager();
        $pm->save($yarn);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function updateYarn(int $id): void
    {
        self::requireAdmin();

        $name = trim(UHTTPMethods::post('name'));

        if ($name === '') {
            http_response_code(400);
            exit('Nome filato non valido');
        }

        $pm = new FPersistentManager();
        $yarn = $pm->findById(EYarn::class, $id);

        if (!$yarn) {
            http_response_code(404);
            exit('Filato non trovato');
        }

        $yarn->setName($name);
        $pm->save($yarn);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function toggleYarn(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $yarn = $pm->findById(EYarn::class, $id);

        if (!$yarn) {
            http_response_code(404);
            exit('Filato non trovato');
        }

        if ($yarn->isActive()) {
            $yarn->deactivate();
        } else {
            $yarn->activate();
        }

        $pm->save($yarn);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    //gestione spessore
    public static function addYarnWeight(): void
    {
        self::requireAdmin();

        $weight = trim(UHTTPMethods::post('weight'));

        if ($weight === '') {
            http_response_code(400);
            exit('Nome spessore non valido');
        }

        $yarnWeight = new EYarnWeight($weight);

        $pm = new FPersistentManager();
        $pm->save($yarnWeight);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function updateYarnWeight(int $id): void
    {
        self::requireAdmin();

        $weight = trim(UHTTPMethods::post('weight'));

        if ($weight === '') {
            http_response_code(400);
            exit('Nome spessore non valido');
        }

        $pm = new FPersistentManager();
        $yarnWeight = $pm->findById(EYarnWeight::class, $id);

        if (!$yarnWeight) {
            http_response_code(404);
            exit('Spessore non trovato');
        }

        $yarnWeight->setWeight($weight);
        $pm->save($yarnWeight);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function toggleYarnWeight(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $yarnWeight = $pm->findById(EYarnWeight::class, $id);

        if (!$yarnWeight) {
            http_response_code(404);
            exit('Spessore non trovato');
        }

        if ($yarnWeight->isActive()) {
            $yarnWeight->deactivate();
        } else {
            $yarnWeight->activate();
        }

        $pm->save($yarnWeight);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    //gestion uncinetti
    public static function addCrochet(): void
    {
        self::requireAdmin();

        $size = trim(UHTTPMethods::post('size'));

        if ($size === '') {
            http_response_code(400);
            exit('Nome spessore non valido');
        }

        $yarnWeight = new ECrochet($size);

        $pm = new FPersistentManager();
        $pm->save($yarnWeight);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function updateCrochet(int $id): void
    {
        self::requireAdmin();

        $size = trim(UHTTPMethods::post('size'));

        if ($size === '') {
            http_response_code(400);
            exit('Misura uncinetto non valida');
        }

        $pm = new FPersistentManager();
        $crochet = $pm->findById(ECrochet::class, $id);

        if (!$crochet) {
            http_response_code(404);
            exit('Uncinetto non trovato');
        }

        $crochet->setSize($size);
        $pm->save($crochet);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }

    public static function toggleCrochet(int $id): void
    {
        self::requireAdmin();

        $pm = new FPersistentManager();
        $crochet = $pm->findById(ECrochet::class, $id);

        if (!$crochet) {
            http_response_code(404);
            exit('Uncinetto non trovato');
        }

        if ($crochet->isActive()) {
            $crochet->deactivate();
        } else {
            $crochet->activate();
        }

        $pm->save($crochet);

        header('Location: ' . BASE_URL . '/adminMaterials');
        exit;
    }
}