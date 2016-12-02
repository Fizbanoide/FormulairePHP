<?php

namespace App\Hours\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
  public function listAll(Request $request, Application $app)
  {
      $hoursData = $app['repository.hour']->getAll();

      foreach ($hoursData as $hourData) {
          $hourEntityList[$hourData['id']] = (new Hour($hourData['id'], $hourData['id_stop'], $hourData['id_line'], $hourData['way'], $hourData['hour']))->toArray();
      }

      return json_encode($hourEntityList);
      return $hours;
  }

  public function listAllFromStop(Request $request, Application $app)
  {
      $parameters['idArret'] = $request->get('idArret');
      $hoursData = $app['repository.hour']->getAllFromStop($parameters);

      foreach ($hoursData as $hourData) {
          $hourEntityList[$hourData['id']] = (new Hour($hourData['id'], $hourData['id_stop'], $hourData['id_line'], $hourData['way'], $hourData['hour']))->toArray();
      }

      return json_encode($hourEntityList);
  }


}
