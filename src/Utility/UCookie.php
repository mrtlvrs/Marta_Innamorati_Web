<?php

namespace Utility;

use Utility\USession;

/**
 * Cookie: context
 * Struttura:
 * - lastCreationId: int|null
 * - lastAuthorId: int|null
 * - filters: array|null
 */

/**
 * class to access to $_COOKIE superglobal array, You must use this class and not directly the _COOKIE array
 */
class UCookie
{
    //controlla solo se esiste un cookie con quel nome
    // public static function isSet($id){
    //     return isset($_COOKIE[$id]);
    // }

    // //legge il valore del cookie e prova a convertirlo da JSON ad array PHP, se fallisce ritorna null
    // public static function get(string $id): ?array
    // {
    //     if (!isset($_COOKIE[$id])) {
    //         return null;
    //     }

    //     $value = json_decode($_COOKIE[$id], true);
    //     return is_array($value) ? $value : null;
    // }

    // //prende un array PHP e lo converte in JSON, poi lo slava come cookie con una durata
    // public static function set(string $id, array $value, ?int $ttl = null): void
    // {
    //     $expire = time() + ($ttl ?? COOKIE_EXP_TIME);

    //     setcookie(
    //         $id,
    //         json_encode($value),
    //         $expire,
    //         '/'
    //     );
    // }

    // //aggiorna il cookie unendo i dati i vecchi dati e i nuovi
    // public static function update(string $id, array $data): void
    // {
    //     $current = self::get($id) ?? [];
    //     $updated = array_merge($current, $data);
    //     self::set($id, $updated);
    // }

    // //il contesto è legato all'utente
    // //se non c'è un utente loggato allora è guest: tutti i guest sullo stesso browser condividono il contesto
    // public static function getContextName(): string
    // {
    //     if (USession::isSetSessionElement('user_id')) {
    //         return 'context_user_' . USession::getSessionElement('user_id');
    //     }

    //     return 'context_guest';
    // }
}
?>