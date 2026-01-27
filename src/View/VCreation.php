<?php

namespace View;

//use Smarty\Smarty;
use Entity\ECreation;
use Utility\UStartSmarty;

class VCreation
{
    public static function show(array $data, ?array $sidebar): void
    {
        $smarty = UStartSmarty::configuration();

        //$smarty->assign('creation', $data['creation']);
        //$smarty->assign('BASE_URL', '/CrochetHub/public/index.php');
        $smarty->assign('creationId', $data['creationId']);
        $smarty->assign('author', $data['author']);
        $smarty->assign('title', $data['title']);
        $smarty->assign('description', $data['description']);
        $smarty->assign('accessories', $data['accessories']);

        $smarty->assign('images', $data['images']);
        $smarty->assign('hasImages', $data['hasImages']);
        
        $smarty->assign('yarn', $data['yarn']);
        $smarty->assign('yarnWeight', $data['yarnWeight']);
        $smarty->assign('crochet', $data['crochet']);
        $smarty->assign('category', $data['category']);

        $smarty->assign('likesCount', $data['likesCount']);
        $smarty->assign('commentsCount', $data['commentsCount']);
        $smarty->assign('comments', $data['comments']);
        $smarty->assign('hasComments', $data['hasComments']);
        $smarty->assign('isLiked', $data['isLiked']);
        $smarty->assign('isSaved', $data['isSaved']);
        $smarty->assign('savedCount', $data['savedCount']);

        $smarty->assign('creationDate', $data['creationDate']);
        $smarty->assign('updateDate', $data['updateDate']);
        $smarty->assign('isUpdated', $data['isUpdated']);

        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('creation.tpl');
    }

    public static function comments(array $comments): void
    {
        $smarty = UStartSmarty::configuration();

        $smarty->assign('comments', $comments);

        $smarty->display('comments.tpl');
    }

    public static function new(array $data, array $sidebar)
    {
        $smarty = UStartSmarty::configuration();

        $smarty->assign('yarns', $data['yarns']);
        $smarty->assign('yarnWeights', $data['yarnWeights']);
        $smarty->assign('crochets', $data['crochets']);
        $smarty->assign('categories', $data['categories']);

        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('new.tpl');
    }

    
    public static function edit(array $data, array $sidebar): void
    {
        $smarty = UStartSmarty::configuration();

        if (isset($data['error'])) {
            $smarty->assign('error', $data['error']);
        }

        $smarty->assign('isEdit', $data['isEdit'] ?? false);
        $smarty->assign('creationId', $data['creationId']);
        $smarty->assign('title', $data['title']);
        $smarty->assign('description', $data['description']);

        $smarty->assign('selectedYarn', $data['selectedYarn']);
        $smarty->assign('selectedYarnWeight', $data['selectedYarnWeight']);
        $smarty->assign('selectedCrochet', $data['selectedCrochet']);
        $smarty->assign('selectedCategory', $data['selectedCategory']);

        $smarty->assign('yarns', $data['yarns']);
        $smarty->assign('yarnWeights', $data['yarnWeights']);
        $smarty->assign('crochets', $data['crochets']);
        $smarty->assign('categories', $data['categories']);

        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        $smarty->display('edit_creation.tpl');
    }

}