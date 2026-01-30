<?php
//classe che riceve tutte le richieste (URL) e decide quale controller chiamare

namespace Controller;

use Utility\UServer;

class CFrontController
{
    //tabella delle rotte
    private static array $routes = [
        //HOME
        ''                  => ['Controller\CHome', 'showHome'],
        'home'              => ['Controller\CHome', 'showHome'],
        //AUTH
        'login'             => ['Controller\CUser', 'login'],
        'logout'            => ['Controller\CUser', 'logout'],
        'register'          => ['Controller\CUser', 'register'],
        //CREAZIONI
        'creation'          => ['Controller\CCreation', 'show'],
        'creationComments'  => ['Controller\CCreation', 'loadMoreComments'],
        'creationNew'       => ['Controller\CCreation', 'new'],
        'creationSave'      => ['Controller\CCreation', 'save'],
        'creationEdit'      => ['Controller\CCreation', 'edit'],
        'creationUpdate'    => ['Controller\CCreation', 'update'],
        'creationDelete'    => ['Controller\CCreation', 'delete'],
        //AZIONI SU CREAZIONI
        'comment'           => ['Controller\CComment', 'comment'],
        'commentDelete'     => ['Controller\CComment', 'delete'],
        'like'              => ['Controller\CLike', 'like'],
        'save'              => ['Controller\CSave', 'save'],
        'saved'             => ['Controller\CSave', 'show'],
        //UTENTE
        'profile'           => ['Controller\CUser', 'profile'],
        'profileEdit'       => ['Controller\CUser', 'edit'],
        'profileSave'       => ['Controller\CUser', 'save'],
        // FOLLOW
        'toggle'            => ['Controller\CFollow', 'toggle'],
        'follow'            => ['Controller\CFollow', 'show'],
        // ADMIN CONTENTS
        'adminContents'     => ['Controller\CAdmin', 'manageContents'],
        'adminContentView'  => ['Controller\CAdmin', 'viewCreation'],
        'adminContentDelete'=> ['Controller\CAdmin', 'deleteCreation'],
        'adminCommentDelete'=> ['Controller\CAdmin', 'deleteComment'],
        // ADMIN USERS
        'adminUsers'        => ['Controller\CAdmin', 'manageUsers'],
        'adminUserView'     => ['Controller\CAdmin', 'viewUser'],
        'adminUserDelete'   => ['Controller\CAdmin', 'deleteUser'],
        // ADMIN MATERIALS
        'adminMaterials'      => ['Controller\CAdmin', 'manageMaterials'],

        'adminCategoryAdd'    => ['Controller\CAdmin', 'addCategory'],
        'adminCategoryToggle' => ['Controller\CAdmin', 'toggleCategory'],

        'adminYarnAdd'        => ['Controller\CAdmin', 'addYarn'],
        'adminYarnToggle'     => ['Controller\CAdmin', 'toggleYarn'],

        'adminWeightAdd'      => ['Controller\CAdmin', 'addYarnWeight'],
        'adminWeightToggle'   => ['Controller\CAdmin', 'toggleYarnWeight'],

        'adminCrochetAdd'     => ['Controller\CAdmin', 'addCrochet'],
        'adminCrochetToggle'  => ['Controller\CAdmin', 'toggleCrochet'],
    ];

    public function start(): void
    {
        $uri  = UServer::getValue('REQUEST_URI') ?? '';     //path richiesto dal browser
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';       //prende solo il path senza ?a=b...

        $scriptName = UServer::getValue('SCRIPT_NAME') ?? '';       //path del file php che apache ha eseguito per gestire la richiesta (/CrochetHub)
        $baseDir = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');    //replace di backslash

        // Rimuove il baseDir dalla richiesta se presente
        if ($baseDir !== '' && $baseDir !== '/' && str_starts_with($path, $baseDir)) {
            $path = substr($path, strlen($baseDir));
        }

        // Normalizza e rimuove eventuale "index.php" all'inizio del path
        $path = trim($path, '/');
        if ($path === 'index.php') {
            $path = '';
        } elseif (str_starts_with($path, 'index.php/')) {
            $path = substr($path, strlen('index.php/'));
        }

        //se path è vuoto contiene '', altrimenti divide il path per le /
        $parts = $path === '' ? [''] : explode('/', $path);

        $routeKey = $parts[0] ?? '';        //prima parte (rotta)
        $params   = array_slice($parts, 1); //seconda parte (id)

        // rotta non esistente
        if (!isset(self::$routes[$routeKey])) {
            $this->notFound();
            return;
        }

        //recupera controller e metodo nella tabella delle rotte
        [$controller, $method] = self::$routes[$routeKey];
        $controllerInstance = new $controller();    //contiene un oggetto controller giusto per la rotta corrente

        if (!class_exists($controller) || !method_exists($controller, $method)) {
            $this->notFound();
            return;
        }

        try {
            call_user_func_array([$controllerInstance, $method], $params);
        } catch (\TypeError $e) {
            // parametri errati (es: string invece di int)
            $this->badRequest();
        } catch (\Throwable $e) {
            // qualsiasi altro errore
            $this->serverError();
        }
    }

    private function notFound(): void
    {
        http_response_code(404);
        exit;
    }

    private function badRequest(): void
    {
        http_response_code(400);
        exit;
    }

    private function serverError(): void
    {
        http_response_code(500);
        exit;
    }
}