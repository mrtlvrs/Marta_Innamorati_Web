<?php
namespace View;

use Utility\UStartSmarty;

class VSave{
    public static function show(array $data, int $page, int $totalPages, ?array $sidebar) 
    {
        $smarty = UStartSmarty::configuration();

        $smarty->assign('creations', $data);
        $smarty->assign('title', 'Creazioni salvate');

        //paginazione
        $smarty->assign('page', $page);
        $smarty->assign('totalPages', $totalPages);

        //sidebar
        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('saved.tpl');
    }
}