<?php
namespace Utility;

use Smarty;
use Controller\CUser;

//servizio tecnico condiviso: la View usa Smarty e questo lo prepara
class UStartSmarty
{
    public static function configuration(): Smarty
    {
        $smarty = new Smarty();

        $smarty->setTemplateDir(__DIR__ . '/../Smarty/templates/');
        $smarty->setCompileDir(__DIR__ . '/../Smarty/templates_c/');

        // sviluppo
        $smarty->setCaching(false);
        $smarty->setCompileCheck(true);
        $smarty->setCacheDir(__DIR__ . '/../Smarty/cache');
        $smarty->setConfigDir(__DIR__ . '/../Smarty/configs');

        //variabili globali che servono in tutti i template
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('BASE_PUBLIC', BASE_PUBLIC);
        
        //per personalizzare le pagine in base all'utente
        $user = CUser::getLoggedUser();

        $smarty->assign('isLogged', $user !== null);
        $smarty->assign('loggedUser', $user);
        
        return $smarty;
    }
}