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


}
