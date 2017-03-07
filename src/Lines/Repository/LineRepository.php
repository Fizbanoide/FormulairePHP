<?php

namespace App\Lines\Repository;

use App\Lines\Entity\Line;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class LineRepository
{
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }


   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('*')
           ->from('`lines`');

       $statement = $queryBuilder->execute();
       $linesData = $statement->fetchAll();

       return $linesData;

   }
   
   public function getLineFromId($parameters)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('*')
           ->from('`lines`')
           ->where('id = :id')
           ->setParameter(':id', $parameters['id']);

       $statement = $queryBuilder->execute();
       $lineData = $statement->fetch();

       return $lineData;

   }
   
   public function getNextStopsFromLine($parameters)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('*')
           ->from('`lines`')
           ->where('id = :id')
           ->setParameter(':id', $parameters['lineid']);

       $statement = $queryBuilder->execute();
       $lineData = $statement->fetch();
       
       if($lineData['way'] == 1)
       {
            $queryBuilder = $this->db->createQueryBuilder();
            $queryBuilder
           ->select('*')
           ->from('`line_stop`')
           ->where('id_stop > :id')
           ->setParameter(':id', $parameters['stopid'])
           ->andWhere('id_line = :idline')
           ->setParameter(':idline', $parameters['lineid']);
           
           $statement = $queryBuilder->execute();
           $result = $statement->fetchAll();
       }
       else
       {
            $queryBuilder = $this->db->createQueryBuilder();
            $queryBuilder
           ->select('*')
           ->from('`line_stop`')
           ->where('id_stop < :id')
           ->setParameter(':id', $parameters['stopid'])
           ->andWhere('id_line = :idline')
           ->setParameter(':idline', $parameters['lineid']);
           
           $statement = $queryBuilder->execute();
           $stopsData = $statement->fetchAll();
       }
       
       $result = [];
       foreach($stopsData as $stopData)
       {
            $queryBuilder = $this->db->createQueryBuilder();
            $queryBuilder
           ->select('*')
           ->from('`stops`')
           ->where('id = :id')
           ->setParameter(':id', $stopData['id_stop']);
           
           $statement = $queryBuilder->execute();
           $result[] = $statement->fetch();
       }

       return $result;
   }
}