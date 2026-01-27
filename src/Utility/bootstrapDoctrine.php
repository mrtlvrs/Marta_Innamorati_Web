<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;

/**
 * Restituisce l'unica istanza di Doctrine EntityManager
 * per la durata della request HTTP.
 * Una sola unit of work per request
 */
function getEntityManager(): EntityManager
{
    static $entityManager = null;

    if ($entityManager === null) {

        // Parametri di connessione al database
        $connectionParams = [
            'dbname'   => DB_NAME,
            'user'     => DB_USER,
            'password' => DB_PASS,
            'host'     => DB_HOST,
            'port'     => DB_PORT,
            'driver'   => DRIVER,
        ];

        // Configurazione Doctrine ORM
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/../Entity'],
            isDevMode: true,
            proxyDir: __DIR__ . '/proxy'
        );

        // Connessione DBAL
        $connection = DriverManager::getConnection($connectionParams, $config);

        // Creazione EntityManager Doctrine
        $entityManager = new EntityManager($connection, $config);
    }

    return $entityManager;
}