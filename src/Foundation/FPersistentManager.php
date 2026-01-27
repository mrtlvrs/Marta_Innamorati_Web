<?php
namespace Foundation;

use Doctrine\ORM\EntityManager;
use Entity\EUser;
use Entity\ECreation;
use Entity\EYarn;
use Entity\EYarnWeight;
use Entity\ECrochet;
use Entity\ECategory;

require_once __DIR__ . '/../Utility/bootstrapDoctrine.php';

//classe che coordina l'accesso a doctrine, delegandone l'uso concreto a FEntityManager
class FPersistentManager
{
    private FEntityManager $em;

    #Costruttore che inizializza l'EntityManager
    #Non lo ricrea ogni volta, ma lo ottiene dal DoctrineBootstrap (mantiene allineata la Unit of Work)
    public function __construct()
    {
        $this->em = new FEntityManager();
    }

    public function save(object $entity): void
    {
        $this->em->save($entity);                 
    }

    public function remove(object $entity): void
    {
        $this->em->remove($entity);                 #senza flush non viene eseguita nessuna operazione sul DB
    }

    //metodi find by
    public function findById(string $entityClass, int $id): ?object
    {
        return $this->em->findById($entityClass, $id);
    }

    public function findUserBy(string $entityClass, array $criteria) {
        return $this->em->findOneBy($entityClass, $criteria);
    }

    public function findOneBy(string $entityClass, array $criteria) {
        return $this->em->findOneBy($entityClass, $criteria);
    }

    public function findCreationById(int $id) {
        return $this->em->findbyId(ECreation::class, $id);
    }

    //ritornano liste in ordine crescente
    public function findAllCreations(): array
    {
        return $this->em->findAllOrdered(ECreation::class, ['createdAt' => 'DESC']);
    }

    public function findAllUsers(): array
    {
        return $this->em->findAllOrdered(EUser::class, ['createdAt' => 'DESC']);
    }

    //metodi find per i materiali, per la vista utente ritorna solo quelli attivi, per l'admin li ritorna tutti
    private function findMaterials(string $entityClass, string $orderField, bool $onlyActive = true): array
    {
        $criteria = [];

        if ($onlyActive) {
            $criteria['active'] = true;
        }

        return $this->em->findBy(
            $entityClass,
            $criteria,
            [$orderField => 'ASC']
        );
    }

    public function findAllYarns(): array
    {
        return $this->findMaterials(EYarn::class, 'name', true);
    }

    public function findAllYarnsIncludingInactive(): array
    {
        return $this->findMaterials(EYarn::class, 'name', false);
    }

    public function findAllYarnWeights(): array
    {
        return $this->findMaterials(EYarnWeight::class, 'weight', true);
    }

    public function findAllYarnWeightsIncludingInactive(): array
    {
        return $this->findMaterials(EYarnWeight::class, 'weight', false);
    }

    public function findAllCrochets(): array
    {
        return $this->findMaterials(ECrochet::class, 'size', true);
    }

    public function findAllCrochetsIncludingInactive(): array
    {
        return $this->findMaterials(ECrochet::class, 'size', false);
    }

    public function findAllCategories(): array
    {
        return $this->findMaterials(ECategory::class, 'name', true);
    }

    public function findAllCategoriesIncludingInactive(): array
    {
        return $this->findMaterials(ECategory::class, 'name', false);
    }


    //GESTIONE DEI FILTRI (possono essere accorpati)

    //ritorna le creazioni da mostrare nella home
    public function findLatestCreations(int $limit = 20): array
    {
        return $this->em->findAllOrdered(
            ECreation::class,
            ['createdAt' => 'DESC'],
            $limit
        );
    }

    //permette il filtraggio sia per contesto che dominio
    public function findCreationsByFollowing(EUser $user, int $limit = 20): array           //restituisce 20 creazioni di default
    {
        //recupero degli utenti seguiti, Doctrine accetta array di entità nel parametro IN
        $following = $user->getFollowing()->toArray();

        if (empty($following)) {
            return [];
        }

        //query al DB, Doctrine la traduce in SQL
        //Doctrine parsa il DQL, verifica la sintassi e la traduce in SQL (con placeholder), solo dopo fa binding dei parametri: previene SQL injection
        $dql = "
            SELECT c
            FROM Entity\\ECreation c
            WHERE c.author IN (:following)
            ORDER BY c.createdAt DESC
        ";

        return $this->em->query($dql, ['following' => $following], $limit);
    }

    //filters = criteri scelti dall'utente
    //se user è null siamo nel globale, altrimenti nei per te
    public function findLatestCreationsByFilters(array $filters, int $limit, int $offset, ?EUser $user = null): array
    {
        $conditions = [];   //contiente stringhe di condizioni
        $params = [];       //contiene valori veri

        //per te
        if ($user !== null) {
            $following = $user->getFollowing()->toArray();

            if (empty($following)) {
                return [];
            }

            $conditions[] = 'c.author IN (:following)'; //:following è un placeholder che verrà sostituito da Doctrine durante il binding dei parametri
            $params['following'] = $following;
        }

        //vogliono le entity quindi bisogna poi fare findById
        //filtro categoria 
        if (!empty($filters['category'])) {
            $conditions[] = 'c.category = :category';
            $params['category'] = $filters['category'];
        }

        //filtro filato
        if (!empty($filters['yarn'])) {
            $conditions[] = 'c.yarn = :yarn';
            $params['yarn'] = $filters['yarn'];
        }

        //filtro spessore filato
        if (!empty($filters['yarnWeight'])) {
            $conditions[] = 'c.yarnWeight = :yarnWeight';
            $params['yarnWeight'] = $filters['yarnWeight'];
        }

        //filtro uncinetto
        if (!empty($filters['crochet'])) {
            $conditions[] = 'c.crochet = :crochet';
            $params['crochet'] = $filters['crochet'];
        }

        //costruzione WHERE, filtri combinati in AND
        $where = '';
        if (!empty($conditions)) {
            $where = 'WHERE ' . implode(' AND ', $conditions);
        }

        //DQL finale (latest SEMPRE)
        $dql = "
            SELECT c
            FROM Entity\\ECreation c
            $where
            ORDER BY c.createdAt DESC
        ";

        return $this->em->query($dql, $params, $limit, $offset);
    }

    //conta il numero totale di creazioni nel db che soddisfano i filtri
    public function countCreationsByFilters(array $filters, ?EUser $user): int
    {
        $conditions = [];
        $params = [];

        //per te
        if ($user !== null) {
            $following = $user->getFollowing()->toArray();

            if (empty($following)) {
                return 0;
            }

            $conditions[] = 'c.author IN (:following)';
            $params['following'] = $following;
        }

        //filtri di dominio
        if (!empty($filters['category'])) {
            $conditions[] = 'c.category = :category';
            $params['category'] = $filters['category'];
        }

        if (!empty($filters['yarn'])) {
            $conditions[] = 'c.yarn = :yarn';
            $params['yarn'] = $filters['yarn'];
        }

        if (!empty($filters['yarnWeight'])) {
            $conditions[] = 'c.yarnWeight = :yarnWeight';
            $params['yarnWeight'] = $filters['yarnWeight'];
        }

        if (!empty($filters['crochet'])) {
            $conditions[] = 'c.crochet = :crochet';
            $params['crochet'] = $filters['crochet'];
        }

        //WHERE
        $where = '';
        if (!empty($conditions)) {
            $where = 'WHERE ' . implode(' AND ', $conditions);
        }

        //query
        $dql = "
            SELECT COUNT(c.id)
            FROM Entity\\ECreation c
            $where
        ";

        return (int) $this->em->scalar($dql, $params);
    }
    
    // conta il numero totale di creazioni salvate da un utente
    public function countSavedCreations(EUser $user): int
    {
        $dql = "
            SELECT COUNT(c.id)
            FROM Entity\\ECreation c
            JOIN c.savedBy u
            WHERE u = :user
        ";

        return (int) $this->em->scalar($dql, ['user' => $user]);
    }

    // ritorna le creazioni salvate da un utente, paginate
    public function findSavedCreationsPaginated(EUser $user, int $limit, int $offset): array
    {
        $dql = "
            SELECT c
            FROM Entity\\ECreation c
            JOIN c.savedBy u
            WHERE u = :user
            ORDER BY c.createdAt DESC
        ";

        return $this->em->query($dql, ['user' => $user], $limit, $offset);
    }


    //gestione commenti creazioni, li pagina in base ad un certo limite
    public function findCommentsByCreation(ECreation $creation, int $limit, int $offset): array
    {
        $dql = "
            SELECT c
            FROM Entity\\EComment c
            WHERE c.creation = :creation
            ORDER BY c.createdAt ASC
        ";

        return $this->em->query(
            $dql,
            ['creation' => $creation],
            $limit,
            $offset
        );
    }
}