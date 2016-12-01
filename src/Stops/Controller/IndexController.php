<?php

namespace App\Stops\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
  public function listAll(Request $request, Application $app)
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

  public function listAllFromLine(Request $request, Application $app)
  {
      $parameters['line'] = $request->get('line');
      $stops = $app['repository.stop']->getAllFromLine($parameters);

      return $stops;
  }

  public function itinary(Request $request, Application $app)
  {
    $parameters['name1'] = $request->get('name1');
    $parameters['name2'] = $request->get('name2');
    $parameters['line'] = $request->get('line');

    $stops = $app['repository.stop']->getItinary($parameters);

    return $stops;

  }


}
