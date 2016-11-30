<?php

namespace App\Stops\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
  public function listAction(Request $request, Application $app)
  {
      $stops = $app['repository.stop']->getAll();

      return $stops;
  }

  public function getStop(Request $request, Application $app)
  {
    $parameters['name'] = $request->get('name');

    $stop = $app['repository.stop']->getStopByName($parameters);

    return $stop;
  }


}
