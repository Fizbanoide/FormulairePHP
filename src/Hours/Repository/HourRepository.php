<?php

namespace App\Hours\Repository;

use App\Hours\Entity\Hour;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class HourRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('h.*')
            ->from('hours', 'h');

        $statement = $queryBuilder->execute();
        $hoursData = $statement->fetchAll();

        return $hoursData;

    }

    public function getAllFromStop($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('s.*')
            ->from('stops', 's')
            ->where('id = :id')
            ->setParameter(':id', $parameters['idArret']);

        $statement = $queryBuilder->execute();
        $stopData = $statement->fetchAll();

        $queryBuilder
            ->select('h.*')
            ->from('hours', 'h')
            ->where('id_stop = :idstop')
            ->setParameter(':idstop', $stopData[0]['id']);

        $statement = $queryBuilder->execute();
        $hoursData = $statement->fetchAll();

        return $hoursData;
    }

}
