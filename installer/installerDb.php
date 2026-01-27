<?php

require_once __DIR__ . '/../src/Utility/config.php';

use Doctrine\ORM\Tools\SchemaTool;

require_once(__DIR__ . '/../src/Utility/bootstrapDoctrine.php');

class installerDb
{
    //crea il db se non esiste o è vuoto
    public static function install()
    {
        //intercetta errori di connessione a MySQL
        try {
            //PDO è l'API standard di PHP per parlare con i database (Doctrine lavora solo su db esistenti, la creazione con il db avviene tramite PDO)
            //usa le costanti definite in config per connettersi al server MySQL
            $db = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);

            //verifica se il db esiste
            $stmt = $db->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . DB_NAME . "'");
            $existingDatabase = $stmt->fetchColumn();

            //verifica se il db è vuoto
            $tables = $db->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '" . DB_NAME . "';");
            $existingTables = $tables->fetchColumn();

            //se non esiste o è vuoto lo crea
            if (!$existingDatabase || $existingTables == 0) {
                $queryCreateDB = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;    //crea il db
                $db->exec($queryCreateDB);

                //Crea un oggetto di Doctrine che sa trasformare le Entity PHP in tabelle del database, usando l’EntityManager
                $schemaTool = new SchemaTool(getEntityManager());

                //prende tutti i metadata delle Entity
                $metadata = getEntityManager()->getMetadataFactory()->getAllMetadata();

                //crea le tabelle
                $schemaTool->createSchema($metadata);
            }

            // If a PDOException occurs, the error will be caught and logged
        } catch (PDOException $e) {
            die("Errore creazione database: " . $e->getMessage());
        }
    }
}