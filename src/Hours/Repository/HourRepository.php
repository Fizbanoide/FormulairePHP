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
        $queryBuilder
            ->select('*')
            ->from('hours')
            ->where('id_line_stop = :idlinestop')
            ->setParameter(':idlinestop', $parameters['id']);

        $statement = $queryBuilder->execute();
        $hoursData = $statement->fetchAll();

        return $hoursData;
    }

}
