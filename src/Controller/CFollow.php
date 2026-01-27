<?php

namespace Controller;

use Foundation\FPersistentManager;
use Entity\EUser;
use Entity\ECreation;
use Controller\CUser;
use View\VFollow;
use Utility\USession;
use Utility\UServer;
use Utility\USidebarContext;

class CFollow {
    public static function toggle(string $username): void
    {
        CUser::requireLogin(true);

        $pm = new FPersistentManager();
        $target = $pm->findUserBy(EUser::class, ['username' => $username]);

        if (!$target) {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        $current = CUser::getLoggedUser();

        // sicurezza: non puoi seguire te stesso
        if ($current->getId() === $target->getId()) {
            header('Location:' . BASE_URL . '/profile/' . $username);
            exit;
        }

        if ($current->isFollowing($target)) {
            $current->unfollow($target);
        } else {
            $current->follow($target);
        }

        $pm->save($current);

        header('Location:' . BASE_URL . '/profile/' . $username);
        exit;
    }

    //unica funzione che gestisce sia la visualizzazione dei following che dei follower 
    public static function show(string $username, string $mode = 'followers'): void
    {
        $pm = new FPersistentManager();
        $user = $pm->findUserBy(EUser::class, ['username' => $username]);

        if (!$user) {
            header('Location:' . BASE_URL . '/home');
            exit;
        }

        if ($mode === 'following') {
            $list = $user->getFollowing();
        } else {
            $mode = 'followers'; // fallback sicuro
            $list = $user->getFollowers();
        }

        $users = [];
        foreach ($list as $u) {
            $users[] = [
                'username' => $u->getUsername(),
                'avatar'   => $u->getAvatarPath()
            ];
        }

        //SIDEBAR
        USession::getInstance();
        $sidebar = USidebarContext::get();

        $data = [
            'username' => $user->getUsername(),
            'users' => $users,
            'mode' => $mode,
        ];


        VFollow::show($data, $sidebar);
    }
}