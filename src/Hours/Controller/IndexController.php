<?php

namespace App\Hours\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
  public function listAll(Request $request, Application $app)
  {
      $hours = $app['repository.hour']->getAll();

      return $hours;
  }

  public function listAllFromStop(Request $request, Application $app)
  {
      $parameters['name'] = $request->get('name');
      $hours = $app['repository.hour']->getAllFromStop($parameters);

      return $hours;
  }


}
