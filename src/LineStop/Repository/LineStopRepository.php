<?php

namespace App\LineStop\Repository;

use App\LineStop\Entity\LineStop;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class LineStopRepository
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
           ->from('line_stop');

       $statement = $queryBuilder->execute();
       $linestopsData = $statement->fetchAll();

       return $linestopsData;

   }
   
   public function getStopsFromLine($parameters)
   {
        $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('*')
           ->from('line_stop')
           ->where('id_line = :lineid')
           ->setParameter(':lineid', $parameters['id']);

       $statement = $queryBuilder->execute();
       $lineData = $statement->fetchAll();

       return $lineData;
   }
   
   public function getLinesFromStop($parameters)
   {
        $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('*')
           ->from('line_stop')
           ->where('id_stop = :stopid')
           ->setParameter(':stopid', $parameters['id']);

       $statement = $queryBuilder->execute();
       $lineData = $statement->fetchAll();

       return $lineData;
   }
   
   public function getLineStop($parameters)
   {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from('line_stop')
            ->where('id_stop = :stopid')
            ->setParameter(':stopid', $parameters['id_stop'])
            ->andWhere('id_line = :lineid')
            ->setParameter(':lineid', $parameters['id_line']);
            
        $statement = $queryBuilder->execute();
        $result = $statement->fetch();
        
        return $result;
   }
}