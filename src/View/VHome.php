<?php

namespace View;

use Utility\UStartSmarty;
use Entity\ECategory;
use Entity\ECrochet;
use Entity\EYarn;
use Entity\EYarnWeight;
use Entity\EUser;
use Entity\ECreation;

class VHome
{
    public static function showHome(array $data, string $mode, array $categories, array $yarns, array $yarnWeights, array $crochets, array $filters, int $page, int $totalPages, array $sidebar): void
    {
        $smarty = UStartSmarty::configuration();

        //visualizzazione creazioni
        $smarty->assign('title', 'Home');
        $smarty->assign('creations', $data);
        //modalità di visualizzazione
        $smarty->assign('mode', $mode);
        //form filtri
        $smarty->assign('categories', $categories);
        $smarty->assign('yarns', $yarns);
        $smarty->assign('yarnWeights', $yarnWeights);
        $smarty->assign('crochets', $crochets);
        //filtri applicati (solo per riflettere lo stato attuale)
        $smarty->assign('filters', $filters);
        //paginazione
        $smarty->assign('page', $page);
        $smarty->assign('totalPages', $totalPages);
        //sidebar
        $smarty->assign('lastCreation', $sidebar['lastCreation']);
        $smarty->assign('lastAuthor', $sidebar['lastAuthor']);
        $smarty->assign('isAdmin', $sidebar['isAdmin']);

        // Template
        $smarty->display('home.tpl');
    }
}