<?php
namespace Utility;
require_once __DIR__ . '/config.php'; // Include the configuration file

//È una classe di utilità che incapsula l’accesso alla superglobale $_SESSION, garantendo un’unica inizializzazione della sessione
//Finché l'utente non effettua il logout (distruggendo la sessione), il browser mantiene un cookie con l'ID di sessione associato all'utente
//Questo cookie viene scambiato in ogni richiesta HTTP
class USession
{

    /**
     * singleton class, in this way the session is started only once
     * class for the session, if you want to manipulate the $_SESSION superglobal you need to use this class
     */

    private static $instance;

    private function __construct()
    {
        ini_set('session.gc_maxlifetime', COOKIE_EXP_TIME); //set the session garbage collection max lifetime
        session_set_cookie_params(lifetime_or_options: COOKIE_EXP_TIME); //set the duration of the session cookie
        session_start(); //start the session
    }

    public static function getInstance() //singleton
    {
        if (self::$instance == null) {
            self::$instance = new USession();
        }

        return self::$instance;
    }

    /**
     * return session status. If you want to check if the session is started you can use this
     */
    public static function getSessionStatus()
    {
        return session_status();
    }

    /**
     * unset all the elements in the $_SESSION superglobal
     */
    public static function unsetSession()
    {
        session_unset();
    }

    /**
     * unset of an element of $_SESSION superglobal
     */
    public static function unsetSessionElement($id)
    {
        unset($_SESSION[$id]);
    }

    /**
     * destroy the session, this will remove all the session data and destroy the session
     */
    public static function destroySession()
    {
        session_destroy();
    }

    /**
     * get element in the $_SESSION superglobal
     * if the key doesn't exist, notice PHP
     */
    public static function getSessionElement($id)
    {
        return $_SESSION[$id] ?? null;
    }

    /**
     * set an element in $_SESSION superglobal
     */
    public static function setSessionElement($id, $value)
    {
        $_SESSION[$id] = $value;
    }

    /**
     * check if an element is set or not
     * @return boolean
     */
    public static function isSetSessionElement($id): bool
    {
        if (isset($_SESSION[$id])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Regenerate the session ID to prevent session fixation attacks
     */
    public static function regenerateId(): void
    {
        // Ensure the session is started
        if (session_status() !== PHP_SESSION_ACTIVE) {
            self::getInstance();
        }

        session_regenerate_id(true);
    }
}