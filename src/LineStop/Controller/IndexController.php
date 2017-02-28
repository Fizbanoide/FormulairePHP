<?php

namespace App\LineStop\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use App\LineStop\Entity\LineStop;

class IndexController
{
    public function listAll(Request $request, Application $app)
    {
        $linestopsData = $app['repository.linestop']->getAll();

        foreach ($linestopsData as $linestopData) {
            
            $linestopEntityList[$linestopData['id']] = (new LineStop($linestopData['id'], $linestopData['id_line'], $linestopData['id_stop']))->toArray();          
        }
        
        return json_encode($linestopEntityList);
    }
    
    public function getStopsFromLine(Request $request, Application $app)
    {
        $parameters['id'] = $request->get('lineid');
        $linestopsData = $app['repository.linestop']->getStopsFromLine($parameters);
        
        return json_encode($linestopsData);
    }
    
    public function getLinesFromStop(Request $request, Application $app)
    {
        $parameters['id'] = $request->get('stopid');
        $linestopsData = $app['repository.linestop']->getLinesFromStop($parameters);
                
        return json_encode($linestopsData);
    }
    
    public function getLineStop(Request $request, Application $app)
    {
        $parameters['id_line'] = $request->get('idline');
        $parameters['id_stop'] = $request->get('idstop');
        
        $lineStop = $app['repository.linestop']->getLineStop($parameters);
        
        return json_encode($lineStop);
    }
}