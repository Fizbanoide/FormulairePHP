<?php

namespace App\Stops\Repository;

use App\Stops\Entity\Stop;
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        return $stopsData;

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

        return ($stopsData);

    }

    public function getStopById($parameters)
    {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('s.*')
        ->from('stops', 's')
        ->where('id = :id')
        ->setParameter(':id', $parameters['id']);

      $statement = $queryBuilder->execute();
      $stopData = $statement->fetchAll();

      return $stopData;
    }

    public function getItinary($parameters)
    {


      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
          ->select('s.*')
          ->from('stops', 's')
          ->where('line = :line')
          ->setParameter(':line', $parameters['ligne']);

      $statement = $queryBuilder->execute();
      $stopsData = $statement->fetchAll();

      return $stopsData;

    }

    public function getHour($parameters)
    {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
          ->select('h.*')
          ->from('hours', 'h')
          ->where('hour > :hour')
          ->setParameter(':hour', $parameters['heure'])
          ->andwhere('id_stop = :idstop')
          ->setParameter(':idstop', $parameters['idArretDepart'])
          ->andwhere('way = :way')
          ->setParameter(':way', $parameters['sens']);

      $statement = $queryBuilder->execute();
      $hoursDepartData = $statement->fetch();

      $result[] = $hoursDepartData;

      $queryBuilder
          ->select('h.*')
          ->from('hours', 'h')
          ->where('hour > :hour')
          ->setParameter(':hour', $hoursDepartData['hour'])
          ->andwhere('id_stop = :idstop')
          ->setParameter(':idstop', $parameters['idArretArrivee'])
          ->andwhere('way = :way')
          ->setParameter(':way', $parameters['sens']);

      $statement = $queryBuilder->execute();
      $hoursArriveeData = $statement->fetch();

      $result [] = $hoursArriveeData;

      return ($result);
    }

}
