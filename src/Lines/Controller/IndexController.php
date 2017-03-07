<?php

namespace App\Lines\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use App\Lines\Entity\Line;

class IndexController
{
    public function listAll(Request $request, Application $app)
    {
        $linesData = $app['repository.line']->getAll();
        
        return json_encode($linesData);
    }
    
    public function getLineFromId(Request $request, Application $app)
    {
        $parameters['id'] = $request->get('id');
        $line = $app['repository.line']->getLineFromId($parameters);
        
        return json_encode($line);
    }
    
    public function getNextStopsFromLine(Request $request, Application $app)
    {
        $parameters['lineid'] = $request->get("line_id");
        $parameters['stopid'] = $request->get("stop_id");
        
        $result = $app['repository.line']->getNextStopsFromLine($parameters);
        
        return json_encode($result);
    }
}