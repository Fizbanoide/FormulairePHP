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
      $way = 0;

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
        $way = 1;
      }

      foreach ($stopsData as $stopData) {

          if($stopData['name'] == $parameters['name1'])
          {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
            $stopidfirst = $stopData['id'];
          }
          else if($stopData['name'] == $parameters['name2'])
          {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
            $stopidlast = $stopData['id'];
            break;
          }
          else if($stopEntityList)
          {
            $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
          }
      }

      $queryBuilder
          ->select('h.*')
          ->from('hours', 'h')
          ->where('hour > :hour')
          ->setParameter(':hour', $parameters['hour'])
          ->andwhere('id_stop = :idstop')
          ->setParameter(':idstop', $stopidfirst)
          ->andwhere('way = :way')
          ->setParameter(':way', $way);

      $statement = $queryBuilder->execute();
      $hoursDepartData = $statement->fetch();
      print_r($hoursDepartData);

      $queryBuilder
          ->select('h.*')
          ->from('hours', 'h')
          ->where('hour > :hour')
          ->setParameter(':hour', $hoursDepartData['hour'])
          ->andwhere('id_stop = :idstop')
          ->setParameter(':idstop', $stopidlast)
          ->andwhere('way = :way')
          ->setParameter(':way', $way);

      $statement = $queryBuilder->execute();
      $hoursArriveeData = $statement->fetch();
      print_r($hoursArriveeData);


      return json_encode($stopEntityList);
    }

}
