<?php

namespace Utility;

//$_POST e $_FILES sono suprglobali create automaticamente da PHP, esistono solo durante una request HTTP
//$_POST contiene solo dati testuali, in $_FILES finiscono i file inviati tramite post
class UHTTPMethods
{
    //per l'accesso a POST
    public static function post($param)
    {
        return $_POST[$param];
    }

    //numero variabile di parametri in ingresso
    public static function files(...$param)
    {
        if (count($param)  == 1) return $_FILES[$param[0]];     //restituisce tutto il file
        else if (count($param) == 2) return $_FILES[$param[0]][$param[1]];      //restituisce un campo di un file
        else if (count($param) == 3) return $_FILES[$param[0]][$param[1]][$param[2]];  //gestione input multipli
        //else if (count($param) == 4) return $_FILES[$param[0]][$param[1]][$param[2]][$param[3]];
        //else return $_FILES[$param[0]][$param[1]][$param[2]][$param[3]][$param[4]];
    }
}

// creato quando c'è un input type="file"
/* $_FILES = [
    'miofile' => [
        'name'     => 'documento.pdf',     // Nome originale del file
        'type'     => 'application/pdf',   // Tipo MIME dichiarato dal browser
        'tmp_name' => '/tmp/phpA1B2.tmp',  // Percorso temporaneo sul server
        'error'    => 0,                   // Codice di errore (0 = OK)
        'size'     => 123456               // Dimensione in byte
    ]
*/