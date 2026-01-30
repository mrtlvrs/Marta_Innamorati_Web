<?php

namespace Foundation;

use Doctrine\ORM\EntityManagerInterface;
require_once __DIR__ . '/../Utility/bootstrapDoctrine.php';


//wrapper dell'entity manager di Doctrine, tutta l'applicazione usa Doctrine tramite questa classe
class FEntityManager
{
    private EntityManagerInterface $em;

    public function __construct()
    {
        $this->em = \getEntityManager();      //ottiene l'EntityManager dal DoctrineBootstrap
    }

    public function save(object $entity): void
    {
        $this->em->persist($entity);            #registera l'entità nella Unit of Work
        $this->em->flush();                     #Doctrine capisce come deve gestire il nuovo oggetto ed esegue le operazioni di persistenza sul DB
    }

    public function remove(object $entity): void
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    /**
     * Trova una entità tramite l'id
     */
    public function findById(string $entityClass, int $id): ?object     #metodo di Doctrine
    {
        return $this->em->find($entityClass, $id);
    }

    /**
     * Trova tutte le entità di una classe (tutti i record di una tabella)
     */
    public function findAll(string $entityClass): array
    {
        return $this->em->getRepository($entityClass)->findAll();
    }

    /**
     * Trova tutte le entità ordinate per uno o più campi, con limite e offset opzionali
     */
    public function findAllOrdered(string $entityClass, array $orderBy, ?int $limit = null, ?int $offset = null): array
    {
        return $this->em
            ->getRepository($entityClass)
            ->findBy([], $orderBy, $limit, $offset);
    }

    /**
     * Trova una entità tramite un attributo (email, username, ecc.) -> se ne trova più di una, ritorna la prima
     */
    public function findOneBy(string $entityClass, array $criteria): ?object
    {
        return $this->em->getRepository($entityClass)->findOneBy($criteria);
    }

    /**
     * Trova molte entità tramite criteri (es. tutte le creazioni di un utente)
     */
    public function findBy(string $entityClass, array $criteria): array
    {
        return $this->em->getRepository($entityClass)->findBy($criteria);
    }

    /**
     * Query personalizzata con DQL
     */
    public function query(string $dql, array $params = [], ?int $limit = null, ?int $offset = null): array  //null=non applicare, altrimenti applica
    {
        $query = $this->em->createQuery($dql);      //Doctrine crea una query

        foreach ($params as $key => $value) {       //elenco dei parametri nominati nella query (contenuti come placeholder)
            $query->setParameter($key, $value);     //sostituisce i veri parametri nella query (binding)
        }

        //il limit è applicato DOPO i filtri (per distinguere filtri di contesto e di dominio)
        if ($limit !== null) {
            $query->setMaxResults($limit);
        }

        if ($offset !== null) {
            $query->setFirstResult($offset);
        }

        return $query->getResult();
    }

    //conta quante entity soddisfano una certa condizione (usato per la paginazione)
    public function scalar(string $dql, array $params = []): mixed
    {
        $query = $this->em->createQuery($dql);

        foreach ($params as $key => $value) {
            $query->setParameter($key, $value);
        }

        return $query->getSingleScalarResult();
    }


}