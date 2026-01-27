<?php

namespace View;

use Utility\UStartSmarty;

class VUser
{
    /**
     * Mostra la pagina di login
     * La View può mostrare uno stato diverso della stessa pagina senza cambiare template:
     * se il login fallisce reindirizza alla stessa pagina con un feedback
     */
    public static function login(array $sidebar, ?string $error = null): void
    {
        //var_dump($error);
        //exit;
        $smarty = UStartSmarty::configuration();

        if ($error !== null) {
            $smarty->assign('error', $error);
        }
        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('login.tpl');
    }

    /**
     * Mostra la pagina di registrazione
     */
    public static function register(array $sidebar, ?string $error = null): void
    {
        $smarty = UStartSmarty::configuration();

        if ($error !== null) {
            $smarty->assign('error', $error);
        }

        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('register.tpl');
    }

    public static function profile(array $data, ?array $sidebar): void
    {
        $smarty = UStartSmarty::configuration();

        $smarty->assign('username', $data['username']);
        $smarty->assign('bio', $data['bio']);
        $smarty->assign('avatar', $data['avatar']);
        $smarty->assign('createdAt', $data['createdAt']);
        $smarty->assign('avatarInitial', $data['avatarInitial']);
        $smarty->assign('hasAvatar', $data['hasAvatar']);
        $smarty->assign('creations', $data['creationsData']);
        $smarty->assign('isOwner', $data['isOwner']);
        $smarty->assign('isFollowing', $data['isFollowing']);
        $smarty->assign('followingCount', $data['followingCount']);
        $smarty->assign('followerCount', $data['followerCount']);
        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('profile.tpl');
    }

    public static function edit(array $data, ?array $sidebar): void {
        $smarty = UStartSmarty::configuration();

        $smarty->assign('username', $data['username']);
        $smarty->assign('email', $data['email']);
        $smarty->assign('bio', $data['bio']);
        $smarty->assign('hasAvatar', $data['hasAvatar']);

        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('edit_profile.tpl');
    }
}