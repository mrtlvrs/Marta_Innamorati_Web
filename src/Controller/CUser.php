<?php

namespace Controller;

use Entity\EUser;
use Entity\ECreation;
use Foundation\FPersistentManager;
use Utility\USession;
use Utility\UServer;
use Utility\UHTTPMethods;
use Utility\USidebarContext;
use View\VUser;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class CUser
{
    //gestisce il login, se è get mostra il form, se è post effettua l'autenticazione
    public static function login(): void
    {
        // GET mostra il form
        if (UServer::getRequestMethod() === 'GET') {

            //se già loggato lo reindirizza alla home
            if (self::isLogged()) {
                header('Location: ' . BASE_URL . '/home');
                exit;
            }

            $sidebar = USidebarContext::get();

            VUser::login($sidebar);
            return;
        }

        // POST processa il login
        if (UServer::getRequestMethod() === 'POST') {

            $email = trim(UHTTPMethods::post('email'));
            $password = UHTTPMethods::post('password');

            if ($email === '' || $password === '') {
                VUser::login('Compila tutti i campi');
                return;
            }

            $pm = new FPersistentManager();
            $user = $pm->findUserBy(EUser::class, ['email' => $email]);
        
            if (!$user || !password_verify($password, $user->getPasswordHash())) {
                $sidebar = USidebarContext::get();
                VUser::login($sidebar, 'Email o password errati');
                return;
            }

            // LOGIN OK
            USession::getInstance();
            USession::regenerateId(); // sicurezza, se qualcuno assegna un id di sessione all'utente e non viene rigenerato dopo login, l'attaccante può usare quell'id
            USession::setSessionElement('user_id', $user->getId());

            $redirect = USession::getSessionElement('redirect');

            if ($redirect) {
                USession::unsetSessionElement('redirect');  //altrimenti un utente al prossimo accesso potrebbe essere rimandato in una pagina vecchia
                header('Location: ' . $redirect);
            } else {
                header('Location: ' . BASE_URL . '/home');
            }
            exit;  
        }

    // Metodo non supportato
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
    }

    /**
     * Gestisce la registrazione
     * POST /register
     */
    public static function register(): void
    {
        // GET mostra il form
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            if (self::isLogged()) {
                header('Location: ' . BASE_URL . '/home');
                exit;
            }

            $sidebar = USidebarContext::get();

            VUser::register($sidebar);
            return;
        }

        // POST processa la registrazione
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = trim($_POST['username'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if ($username === '' || $email === '' || $password === '') {
                $sidebar = USidebarContext::get();
                VUser::register($sidebar, 'Compila tutti i campi');
                return;
            }

            // HASH DELLA PASSWORD
            //la password deve essere mandata in chiaro per essere verificata dal server ma poi viene salvata nel db criptata
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $user = new EUser($username, $email, $hash);
            $pm = new FPersistentManager();

            try {
                $pm->save($user);
            } catch (UniqueConstraintViolationException $e) {

                $message = 'Credenziali già in uso';

                $sidebar = USidebarContext::get();

                VUser::register($sidebar, $message);
                return;
            }
            
            //login automatico dopo la registrazione
            USession::getInstance();
            USession::regenerateId(); 
            USession::setSessionElement('user_id', $user->getId());

            $redirect = USession::getSessionElement('redirect');
            var_dump(USession::getSessionElement('redirect'));

            if ($redirect) {
                USession::unsetSessionElement('redirect');      //altrimenti un utente al prossimo accesso potrebbe essere rimandato in una pagina vecchia
                header('Location: ' . $redirect);
            } else {
                header('Location: ' . BASE_URL . '/home');
            }
            exit; 

            header('Location: ' . BASE_URL . '/home');
            exit;
        }
    }

    /**
     * Verifica se l'utente è loggato
     */
    public static function isLogged(): bool
    {
        USession::getInstance();
        return USession::isSetSessionElement('user_id');
    }

    public static function getLoggedUser(): ?EUser
    {
        if (!self::isLogged()) {
            return null;
        }

        $pm = new FPersistentManager();
        return $pm->findById(EUser::class,USession::getSessionElement('user_id'));
    }

    //metodo richiamato quando un'azione è riservata per utenti loggati con possibilità di salvare o meno l'ultima pagina visitata dall'utente in sessione
    public static function requireLogin(bool $saveRedirect = false): void
    {
        if (!self::isLogged()) {
            USession::getInstance();

            if ($saveRedirect) {
                USession::setSessionElement(
                    'redirect',
                    UServer::getValue('REQUEST_URI')
                );
            }

            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }
    
    /**
     * Logout utente
     * GET /logout
     */
    public static function logout(): void           //quando viene richiamato il metodo reindirizza l'utente alla pagina home
    {
        USession::getInstance();

        // rimuove TUTTI i dati di sessione
        USession::unsetSession();

        // distrugge la sessione lato server
        USession::destroySession();

        // redirect a home pubblica
        header('Location: ' . BASE_URL . '/home');
        exit;
    }

    public static function profile(?string $username = null): void
    {
        $pm = new FPersistentManager();

        //se non passo lo username è il profilo personale
        if ($username === null) {

            self::requireLogin(true);

            $user = self::getLoggedUser();
            $isOwner = true;

        } else {
            //profilo di un altro utente
            $user = $pm->findUserBy(EUser::class, ['username' => $username]);
            $isOwner = self::isLogged() && self::getLoggedUser()->getId() === $user?->getId(); //true: il profilo visualizzato è dell'utente stesso
        }

        if (!$user) {
            header('Location: ' . BASE_URL . '/home');
            exit;
        }
        
        // se non è il profilo dell'autore salva in sessione l'ultimo autore visitato
        if (!$isOwner) {
            USession::getInstance();    //verifica se la sessione è inizializzata, altrimenti (prima interazione dell'utente) la inizializza
            USession::setSessionElement('lastAuthorId', $user->getId());    //salva in sessione l'ultimo autore visto
        }

        $profileInitial = strtoupper($user->getUsername()[0]);

        $creations = $user -> getCreations();
        $creationsData = [];

        foreach ($creations as $creation) {

            // prima immagine (se esiste)
            $firstImage = null;
            if ($creation->getImages()->count() > 0) {
                $firstImage = $creation->getImages()->first()->getPath();
            }

            $creationsData[] = [
                'id' => $creation->getId(),
                'title' => $creation->getTitle(),
                'image'=> $firstImage,
                'likesCount' => $creation->getLikesCount(),
                'commentsCount' => $creation->getCommentCount(),
                'savedCount' => $creation->getSavedCount()
            ];
        }

        $profileAvatarPath = $user->getAvatarPath();

        $profileHasAvatar = $profileAvatarPath !== null && $profileAvatarPath !== '';
        
        $isFollowing = false;
        if(self::isLogged() && !$isOwner) {
            $current = self::getLoggedUser();
            $isFollowing = $current->isFollowing($user);
        }

        //SIDEBAR
        // $lastCreation = null;
        // if (USession::getSessionStatus() == true) {
        //     USession::getInstance();
        //     $lastCreation = USession::getSessionElement('lastCreationId');
        //     if (!empty($lastCreation))
        //     {
        //         $lastCreation = $pm->findById(ECreation::class, (int)USession::getSessionElement('lastCreationId'));
        //     }
        // }

        // $lastCreationData = null;
        // if ($lastCreation instanceof ECreation) {
        //     $lastCreationData = [
        //         'id' => $lastCreation->getId(),
        //         'title' => $lastCreation->getTitle(),
        //         'firstImage' => $lastCreation->getImages()->first()?->getPath(),
        //     ];
        // }

        // $lastAuthor = null;
        // if (USession::getSessionStatus() == true) {
        //     USession::getInstance();
        //     $lastAuthor = USession::getSessionElement('lastAuthorId');
        //     if (!empty($lastAuthor))
        //     {
        //         $lastAuthor = $pm->findById(EUser::class, (int)USession::getSessionElement('lastAuthorId'));
        //     }
        // }

        // $lastAuthorData = null;
        // if ($lastAuthor instanceof EUser) {
        //     $initial = strtoupper($lastAuthor->getUsername()[0]);
        //     $avatar = $lastAuthor->getAvatarPath();
        //     $hasAvatar = $avatar !== null && $avatar !== '';

        //     $lastAuthorData = [
        //         'id' => $lastAuthor->getId(),
        //         'username' => $lastAuthor->getUsername(),
        //         'avatar' => $avatar,
        //         'initial' => $initial,
        //         'hasAvatar' => $hasAvatar,
        //     ];
        // }

        $sidebar = USidebarContext::get();

        // // VERIFICO SE È ADMIN (solo se utente loggato)
        // $isAdmin = false;
        // if ($user !== null) {
        //     $isAdmin = ($user->getRole() === 'ROLE_ADMIN');
        // }

        $data = [
            'username' => $user->getUsername(),
            'bio' => $user->getBio(),
            'avatar' => $profileAvatarPath,
            'avatarInitial' => $profileInitial,
            'hasAvatar' => $profileHasAvatar,
            'createdAt' => $user->getCreatedAt()->format('d/m/Y'),
            'creationsData' => $creationsData,
            'isOwner' => $isOwner,
            'isFollowing' => $isFollowing,
            'followerCount' => $user->getFollowerCount(),
            'followingCount' => $user->getFollowingCount(),
        ];


        VUser::profile($data, $sidebar);
    }



    //prepara il form per la modifica del profilo
    public static function edit(): void
    {
        self::requireLogin(true);

        $user = CUser::getLoggedUser();

        $data = [
            'username' => $user->getUsername(),
            'email'    => $user->getEmail(),
            'bio'      => $user->getBio(),
            'hasAvatar'=> $user->getAvatarPath() !== null,
            'avatarUrl'=> $user->getAvatarPath()
                ? BASE_URL . '/' . $user->getAvatarPath()
                : null
        ];

        $sidebar = USidebarContext::get();

        VUser::edit($data, $sidebar);
    }



    //salva i dati che arrivano dal form di modifica del profilo
    public static function save(): void
    {
        //senza redirect perché save non è una pagina
        self::requireLogin();

        if (UServer::getRequestMethod() !== 'POST') {
            header('Location: ' . BASE_URL . '/profile');
            exit;
        }

        $user = self::getLoggedUser();
        $pm = new FPersistentManager();

        $bio = trim(UHTTPMethods::post('bio') ?? '');
        if ($bio !== '') {
            $user->setBio($bio);
        } else {
            $user->setBio(null);
        }

        // richiesta eliminazione avatar
        $removeAvatar = UHTTPMethods::post('remove_avatar') === '1';

        if ($removeAvatar) {
            $oldAvatar = $user->getAvatarPath();
            if ($oldAvatar) {
                $oldAvatarPath = __DIR__ . '/../../public/' . $oldAvatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath); //elimina l'immagine
                }
            }
            $user->setAvatarPath(null);
        }

        //se l'utente ha cambiato il proprio avatar
        $file = UHTTPMethods::files('avatar');

        if (!$removeAvatar && $file && $file['error'] === UPLOAD_ERR_OK && is_uploaded_file($file['tmp_name']))
        {
            // elimina avatar precedente se presente
            $oldAvatar = $user->getAvatarPath();
            if ($oldAvatar) {
                $oldAvatarPath = __DIR__ . '/../../public/' . $oldAvatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            //percorso su disco
            $uploadDir = __DIR__ . '/../../public/uploads/avatars';

            //crea la directory avatars se non esiste
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = 'avatar_' . $user->getId() . '.' . $extension;

            $absolutePath = $uploadDir . '/' . $filename;
            $relativePath = 'uploads/avatars/' . $filename; //da salvare nel db

            move_uploaded_file($file['tmp_name'], $absolutePath);   //sposta il file
            if (!file_exists($absolutePath)) {
                die('Errore nel salvataggio dell’avatar');
            }

            $user->setAvatarPath($relativePath);    //associa il path all'utente
        }

        $pm->save($user);

        if ($removeAvatar) {
            header('Location: ' . BASE_URL . '/profileEdit');
        } else {
            header('Location: ' . BASE_URL . '/profile');
        }
        exit;
    }
}