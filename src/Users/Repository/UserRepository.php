<?php

namespace App\Users\Repository;

use App\Users\Entity\User;
use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class UserRepository
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
           ->select('u.*')
           ->from('users', 'u');

       $statement = $queryBuilder->execute();
       $usersData = $statement->fetchAll();

       return $usersData;

   }

   public function getByName($firstName, $lastName)
   {
     $queryBuilder = $this->db->createQueryBuilder();
     $queryBuilder
         ->select('u.*')
         ->from('users', 'u')
         ->where(
            $queryBuilder->expr()->andX(
                $queryBuilder->expr()->eq('firstname', "'".$firstName."'"),
                $queryBuilder->expr()->eq('lastname', "'".$lastName."'")
            )
         );

     $statement = $queryBuilder->execute();
     $userData = $statement->fetchAll();

     return $userData;

   }

   /**
    * Returns an User object.
    *
    * @param $id
    *   The id of the user to return.
    *
    * @return array A collection of users, keyed by user id.
    */

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('users')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
        $userData = $statement->fetchAll();

        if(count($userData) == 0) {
          return "Cette utilisateur n'existe pas";
        }
    }


    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('users')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['nom']) {
            $queryBuilder
              ->set('nom', ':nom')
              ->setParameter(':nom', $parameters['nom']);
        }

        if ($parameters['prenom']) {
            $queryBuilder
            ->set('prenom', ':prenom')
            ->setParameter(':prenom', $parameters['prenom']);
        }

        if ($parameters['arretMaison']) {
        	$queryBuilder
        	->set('arretMaison', ':arretMaison')
        	->setParameter(':arretMaison', $parameters['arretMaison']);
        }

        if ($parameters['arretTravail']) {
          $queryBuilder
          ->set('arretTravail', ':arretTravail')
          ->setParameter(':arretTravail', $parameters['arretTravail']);
        }

        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();

        $queryBuilder
          ->insert('users')
          ->values(
              array(
                'lastname' =>':nom',
                'firstname' => ':prenom',
                'arretMaison' => ':arretMaison',
                'arretTravail' => ':arretTravail',
                'login' => ':login',
                'password' => ':password'
              )
          )
          ->setParameter(':nom', $parameters['nom'])
          ->setParameter(':prenom', $parameters['prenom'])
          ->setParameter(':arretMaison', $parameters['arretMaison'])
          ->setParameter(':arretTravail', $parameters['arretTravail'])
          ->setParameter(':login', $parameters['login'])
          ->setParameter(':password', $parameters['password']);

        $statement = $queryBuilder->execute();

    }

    public function checkAuth($parameters)
    {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('u.*')
        ->from('users', 'u')
        ->where('login = :login')
        ->setParameter(':login', $parameters['login'])
        ->andwhere('password = :password')
        ->setParameter(':password', $parameters['password']);

      $statement = $queryBuilder->execute();
      $userData = $statement->fetchAll();

      return $userData;

    }
}
