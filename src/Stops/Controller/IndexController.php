<?php

namespace App\Stops\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use App\Stops\Entity\Stop;

class IndexController
{
  public function listAll(Request $request, Application $app)
  {
      $stops = $app['repository.stop']->getAll();

      if(!$stops){
        $error = array('message' => 'The stops were not found.');

        return $app->json($error, 404);
      }

      return $app->json($stops);
  }

  public function getStop(Request $request, Application $app)
  {
    $parameters['id'] = $request->get('id');

    $stop = $app['repository.stop']->getStopById($parameters);

    if(!$stops){
      $error = array('message' => 'The stops were not found.');

      return $app->json($error, 404);
    }

    foreach ($stop as $stopData) {
        $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
    }


    return json_encode($stopEntityList);

  }

  public function listAllFromLine(Request $request, Application $app)
  {
      $parameters['line'] = $request->get('line');
      $stops = $app['repository.stop']->getAllFromLine($parameters);

      if(!$stops){
        $error = array('message' => 'The line was not found.');

        return $app->json($error, 404);
      }

      return json_encode($stops);
  }

  public function itinary(Request $request, Application $app)
  {
    $parameters['idArretDepart'] = $request->get('idArretDepart');
    $parameters['idArretArrivee'] = $request->get('idArretArrivee');
    $parameters['ligne'] = $request->get('ligne');


    $stopsData = $app['repository.stop']->getItinary($parameters);

    $parameters['id'] = $parameters['idArretDepart'];
    $arret1 = $app['repository.stop']->getStopById($parameters);

    $parameters['id'] = $parameters['idArretArrivee'];
    $arret2 = $app['repository.stop']->getStopById($parameters);


    if($arret1[0]['id'] > $arret2[0]['id']) {
      arsort($stopsData);
    }

    foreach ($stopsData as $stopData) {

        if($stopData['id'] == $parameters['idArretDepart'])
        {
          $stopEntityList[] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
          $stopidfirst = $stopData['id'];
        }
        else if($stopData['id'] == $parameters['idArretArrivee'])
        {
          $stopEntityList[] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
          $stopidlast = $stopData['id'];
          break;
        }
        else if($stopEntityList)
        {
          $stopEntityList[] = (new Stop($stopData['id'], $stopData['name'], $stopData['line']))->toArray();
        }
    }

    return json_encode($stopEntityList);

  }

  public function getHour(Request $request, Application $app)
  {
    $parameters['id_stop'] = $request->get('idArretDepart');
    $parameters['id_line'] = $request->get('idLine');
    $toResult['lineStopDepart'] = $app['repository.linestop']->getLineStop($parameters);
    $parameters['id_stop'] = $request->get('idArretArrivee');
    
    $toResult['lineStopArrivee'] = $app['repository.linestop']->getLineStop($parameters);
    $toResult['heure'] = $request->get('heure');

    $hours = $app['repository.stop']->getHour($toResult);
    $result['depart'] = $hours[0]['hour'];
    $result['arrivee'] = $hours[1]['hour'];

    return json_encode($result);
  }

}
