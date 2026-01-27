<?php
namespace Controller;

use Entity\EComment;
use Entity\ECreation;
use Foundation\FPersistentManager;
use Utility\UHTTPMethods;
use Utility\USession;
use Utility\UServer;

class CComment
{
    public static function comment(): void
    {
        if (!CUser::isLogged()) {
            USession::getInstance();
            USession::setSessionElement('redirect', UServer::getValue('REQUEST_URI'));
            
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        if (UServer::getRequestMethod() !== 'POST') {
            header('Location: ' . BASE_URL . '/home');
            exit;
        }

        $text = trim(UHTTPMethods::post('text'));
        $creationId = (int) UHTTPMethods::post('creation_id');

        if ($text === '' || $creationId <= 0) {
            header('Location: ' . BASE_URL . '/creation/' . $creationId);
            exit;
        }

        $pm = new FPersistentManager();

        $creation = $pm->findById(ECreation::class, $creationId);
        $user = CUser::getLoggedUser();

        $comment = new EComment($text);
        $comment->setAuthor($user);
        $comment->setCreation($creation);

        $pm->save($comment);

        header('Location: ' . BASE_URL . '/creation/' . $creationId);
        exit;
    }

    public static function delete(): void
    {
        if (!CUser::isLogged()) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $commentId = (int)($_POST['comment_id'] ?? 0);
        if ($commentId <= 0) {
            header('Location: ' . BASE_URL . '/home');
            exit;
        }

        $pm = new FPersistentManager();
        $comment = $pm->findById(EComment::class, $commentId);

        if (!$comment) {
            header('Location: ' . BASE_URL . '/home');
            exit;
        }

        $user = CUser::getLoggedUser();

        $isCommentAuthor = $comment->getAuthor()->getId() === $user->getId();
        $isCreationAuthor = $comment->getCreation()->getAuthor()->getId() === $user->getId();

        if (!$isCommentAuthor && !$isCreationAuthor) {
            http_response_code(403);
            echo "Non autorizzato";
            exit;
        }

        $creationId = $comment->getCreation()->getId();
        $pm->remove($comment);

        header('Location: ' . BASE_URL . '/creation/' . $creationId);
        exit;
    }
}