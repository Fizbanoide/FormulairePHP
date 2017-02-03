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

        foreach ($linesData as $lineData) {
            
            $lineEntityList[$lineData['id']] = (new Line($lineData['id'], $lineData['number'], $lineData['terminuses'], $lineData['way']))->toArray();
            
        }

        print(json_encode($lineEntityList));
        return 1;
    }
}