<?php
namespace Utility;

use Foundation\FPersistentManager;
use Utility\USession;
use Entity\EUser;
use Entity\ECreation;

class USidebarContext
{
    public static function get(): array
    {
        // Do not force session start: read only if a session already exists
        if (USession::getSessionStatus() !== PHP_SESSION_ACTIVE) {
            return [
                'lastCreation' => null,
                'lastAuthor'   => null,
                'isAdmin' => false,
            ];
        }

        $pm = new FPersistentManager();

        $data = [
            'lastCreation' => null,
            'lastAuthor'   => null,
        ];

        // Ultima creazione
        $creationId = USession::getSessionElement('lastCreationId');
        if ($creationId) {
            $creation = $pm->findById(ECreation::class, (int)$creationId);
            if ($creation) {
                $firstImagePath = $creation->getImages()->first()?->getPath();

                $data['lastCreation'] = [
                    'id'         => $creation->getId(),
                    'title'      => $creation->getTitle(),
                    'firstImage' => $firstImagePath,
                ];
            }
        }

        // Ultimo autore
        $authorId = USession::getSessionElement('lastAuthorId');
        if ($authorId) {
            $author = $pm->findById(EUser::class, (int)$authorId);
            if ($author) {
                $avatarPath = $author->getAvatarPath();

                $data['lastAuthor'] = [
                    'id'        => $author->getId(),
                    'username'  => $author->getUsername(),
                    'hasAvatar' => $avatarPath !== null,
                    'avatar'    => $avatarPath,
                    'initial'   => strtoupper($author->getUsername()[0]),
                ];
            }
        }

        $data['isAdmin'] = false;
        if (USession::isSetSessionElement('user_id'))
        {
            $userId = USession::getSessionElement('user_id');
            $user = $pm->findById(EUser::class, (int)$userId);

            if ($user && $user->getRole() === 'ROLE_ADMIN') {
                $data['isAdmin'] = true;
            }
        }

        return $data;
    }
}