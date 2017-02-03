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
           ->select('u.*')
           ->from('lines', 'u');

       $statement = $queryBuilder->execute();
       $linesData = $statement->fetchAll();

       return $linesData;

   }
}