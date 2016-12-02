<?php

namespace App\Users\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function listAction(Request $request, Application $app)
    {
        $users = $app['repository.user']->getAll();

        return $users;
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
        $user = $app['repository.user']->getByName($parameters['name']);

        return $user;
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
      $result = $app['repository.user']->checkAuth($parameters);
      //var_dump($result);die;
      return $result;
    }


}
