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

    public function getAllFromLine($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('s.*')
            ->from('stops', 's')
            ->where('line = :line')
            ->setParameter(':line', $parameters['line']);

        $statement = $queryBuilder->execute();
        $stopsData = $statement->fetchAll();
        foreach ($stopsData as $stopData) {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
        }

        return json_encode($stopEntityList);
    }

    public function getStopByName($parameters)
    {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('s.*')
        ->from('stops', 's')
        ->where('name = :name')
        ->setParameter(':name', $parameters['name']);

      $statement = $queryBuilder->execute();
      $stopData = $statement->fetchAll();

      return json_encode($stopData);
    }

    public function getItinary($parameters)
    {
      $parameters['name'] = $parameters['name1'];
      $arret1 = json_decode($this->getStopByName($parameters), true);
      $parameters['name'] = $parameters['name2'];
      $arret2 = json_decode($this->getStopByName($parameters), true);

      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
          ->select('s.*')
          ->from('stops', 's')
          ->where('line = :line')
          ->setParameter(':line', $parameters['line']);

      $statement = $queryBuilder->execute();
      $stopsData = $statement->fetchAll();

      if($arret1[0]['id'] > $arret2[0]['id']) {
        arsort($stopsData);
      }

      foreach ($stopsData as $stopData) {

          if($stopData['name'] == $parameters['name1'])
          {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
          }
          else if($stopData['name'] == $parameters['name2'])
          {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
            break;
          }
          else if($stopEntityList)
          {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
          }
      }

      return json_encode($stopEntityList);
    }

}
