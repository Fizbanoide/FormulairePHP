<?php

namespace App\Stops\Repository;

use App\Stops\Entity\Stop;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class StopRepository
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
            ->select('s.*')
            ->from('stops', 's');

        $statement = $queryBuilder->execute();
        $stopsData = $statement->fetchAll();
        foreach ($stopsData as $stopData) {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
        }

        return json_encode($stopEntityList);
    }

}
