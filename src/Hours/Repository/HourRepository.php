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
        foreach ($hoursData as $hourData) {
            $hourEntityList[$hourData['id']] = (new Hour($hourData['id'], $hourData['id_stop'], $hourData['id_line'], $hourData['way'], $hourData['hour']))->toArray();
        }

        return json_encode($hourEntityList);
    }

}
