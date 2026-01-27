<?php

namespace View;

use Smarty;
use Entity\ECreation;
use Entity\EUser;
use Utility\UStartSmarty;

class VAdmin
{
    //CREAZIONI
    public static function manageContents(array $creations, bool $isAdmin): void
    {
        $smarty = UStartSmarty::configuration();

        $data = [];

        foreach ($creations as $creation) {
            $data[] = [
                'id' => $creation->getId(),
                'title' => $creation->getTitle(),
                'author' => $creation->getAuthor()->getUsername(),
                'date' => $creation->getCreatedAt()->format('d/m/Y'),
                'commentsCount' => count($creation->getComments())
            ];
        }

        $smarty->assign('creations', $data);
        $smarty->assign('isAdmin', $isAdmin);

        $smarty->display('admin_contents.tpl');
    }


    public static function viewCreation(ECreation $creation, bool $isAdmin): void
    {
        $smarty = UStartSmarty::configuration();

        $comments = [];

        foreach ($creation->getComments() as $comment) {
            $comments[] = [
                'id' => $comment->getId(),
                'author' => $comment->getAuthor()->getUsername(),
                'text' => $comment->getText(),
                'date' => $comment->getCreatedAt()->format('d/m/Y H:i')
            ];
        }

        $smarty->assign('creation', [
            'id' => $creation->getId(),
            'title' => $creation->getTitle(),
            'author' => $creation->getAuthor()->getUsername(),
            'date' => $creation->getCreatedAt()->format('d/m/Y'),
            'description' => $creation->getDescription(),
            'comments' => $comments
        ]);

        $smarty->assign('isAdmin', $isAdmin);

        $smarty->display('admin_creation_detail.tpl');
    }


    //UTENTI
    public static function manageUsers(array $users, bool $isAdmin): void
    {
        $smarty = UStartSmarty::configuration();

        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'role' => $user->getRole(),
                'createdAt' => $user->getCreatedAt()->format('d/m/Y'),
                'creationsCount' => count($user->getCreations())
            ];
        }

        $smarty->assign('users', $data);
        $smarty->assign('isAdmin', $isAdmin);

        $smarty->display('admin_users.tpl');
    }

    public static function viewUser(EUser $user, bool $isAdmin): void
    {
        $smarty = UStartSmarty::configuration();

        $smarty->assign('user', [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'createdAt' => $user->getCreatedAt()->format('d/m/Y'),
            'bio' => $user->getBio(),
            'creationsCount' => count($user->getCreations()),
            'followersCount' => count($user->getFollowers()),
            'followingCount' => count($user->getFollowing())
        ]);

        $smarty->assign('isAdmin', $isAdmin);

        $smarty->display('admin_users_detail.tpl');
    }

    // MATERIALI
    public static function manageMaterials(array $categories, array $yarns, array $weights, array $crochets, bool $isAdmin): void
    {
        $smarty = UStartSmarty::configuration();

        $catData = [];
        foreach ($categories as $category) {
            $catData[] = [
                'id'     => $category->getId(),
                'name'   => $category->getName(),
                'active' => $category->isActive()
            ];
        }

        $yarnData = [];
        foreach ($yarns as $yarn) {
            $yarnData[] = [
                'id'     => $yarn->getId(),
                'name'   => $yarn->getName(),
                'active' => $yarn->isActive()
            ];
        }

        $weightData = [];
        foreach ($weights as $weight) {
            $weightData[] = [
                'id'     => $weight->getId(),
                'value'  => $weight->getWeight(),
                'active' => $weight->isActive()
            ];
        }

        $crochetData = [];
        foreach ($crochets as $crochet) {
            $crochetData[] = [
                'id'     => $crochet->getId(),
                'size'   => $crochet->getSize(),
                'active' => $crochet->isActive()
            ];
        }

        $smarty->assign('categories', $catData);
        $smarty->assign('yarns', $yarnData);
        $smarty->assign('weights', $weightData);
        $smarty->assign('crochets', $crochetData);

        $smarty->assign('isAdmin', $isAdmin);

        $smarty->display('admin_materials.tpl');
    }
}