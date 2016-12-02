<?php

namespace App\Users\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function listAction(Request $request, Application $app)
    {
        $usersData = $app['repository.user']->getAll();

        foreach ($usersData as $userData) {
            $userEntityList[$userData['id']] = (new User($userData['id'], $userData['lastname'], $userData['firstname'], $userData['arretMaison'], $userData['arretTravail']))->toArray();
        }

        return json_encode($userEntityList);
    }

    public function deleteAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $user = $app['repository.user']->delete($parameters['id']);

        return $user;
    }

    public function editAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $userData = $app['repository.user']->getByName($parameters['name']);

        $result = count($userData);
        if($result == 0 || $result > 1){
          return "Erreur de login!";
        }
        //var_dump($userData);die;
        $user = new User($userData[0]['id'], $userData[0]['lastname'], $userData[0]['firstname'], $userData[0]['arretMaison'], $userData[0]['arretTravail']);
        return json_encode($user->toArray());
    }

    public function saveAction(Request $request, Application $app)
    {
        $parameters = $request->request->all();
          if ($parameters['id']) {
              $user = $app['repository.user']->update($parameters);
          } else {
              $user = $app['repository.user']->insert($parameters);
          }

        return $app->redirect($app['url_generator']->generate('users.list'));
    }

    public function newAction(Request $request, Application $app)
    {
        $parameters['nom'] = $request->get('nom');
        $parameters['prenom'] = $request->get('prenom');
        $parameters['arretMaison'] = $request->get('arretMaison');
        $parameters['arretTravail'] = $request->get('arretTravail');
        $parameters['login'] = $request->get('login');
        $parameters['password'] = $request->get('password');

        $user = $app['repository.user']->insert($parameters);

        return $user;
    }

    public function authAction(Request $request, Application $app)
    {
      $parameters['login'] = $request->get('login');
      $parameters['password'] = $request->get('password');
      //var_dump($parameters);die;
      $userData = $app['repository.user']->checkAuth($parameters);

      if(count($userData) != 0) {
        return json_encode($userData);
      }

      return "Erreur dans l'authentification";
      //var_dump($result);die;
    }


}
