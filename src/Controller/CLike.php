<?php

namespace Controller;

use Foundation\FPersistentManager;
use Controller\CUser;
use Entity\ECreation;
use Entity\ELike;
use Utility\USession;
use Utility\UServer;

class CLike
{
    public static function like(): void
    {
        //header HTTP, dichiara che la risposta non è HTML ma JSON
        header('Content-Type: application/json');

        //controllo autenticazione, sarà il JS a fare redirect
        if (!CUser::isLogged()) {
            echo json_encode([
                'success' => false,
                'error' => 'NOT_AUTHENTICATED'
            ]);
            return;
        }

        //lettura del corpo della richiesta
        $data = json_decode(file_get_contents('php://input'), true);    //l'input dalla richiesta HTTP (stringa) viene convertito in array PHP
        $creationId = (int) ($data['creation_id'] ?? 0);

        //validazione id
        if ($creationId <= 0) {
            echo json_encode([
                'success' => false,
                'error' => 'INVALID_ID'
            ]);
            return;
        }

        //recupera le entità
        $pm = new FPersistentManager();
        $user = CUser::getLoggedUser();
        $creation = $pm->findById(ECreation::class, $creationId);

        if (!$creation) {
            echo json_encode([
                'success' => false,
                'error' => 'CREATION_NOT_FOUND'
            ]);
            return;
        }

        //verifica se il like già esiste
        $like = $pm->findOneBy(ELike::class, [
            'user' => $user,
            'creation' => $creation
        ]);

        if ($like) {        //like
            $pm->remove($like);
            $liked = false;
        } else {            //unlike
            $like = new ELike($user, $creation);
            $pm->save($like);
            $liked = true;
        }

        $count = count($creation->getLikes());

        //risposta finale
        echo json_encode([
            'success' => true,
            'liked' => $liked,
            'count' => $count
        ]);
    }
}