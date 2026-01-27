<?php

namespace View;

use Utility\UStartSmarty;

class VFollow{
    public static function show(array $data, ?array $sidebar) {
        $smarty = UStartSmarty::configuration();

        $smarty->assign('username', $data['username']);
        $smarty->assign('users', $data['users']);
        $smarty->assign('mode', $data['mode']);

        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('follow.tpl');
    }
}