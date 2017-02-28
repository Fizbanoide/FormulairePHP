<?php

namespace App\Hours\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Hours\Entity\Hour;

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
      $parameters['id'] = $request->get('id');
      $hoursData = $app['repository.hour']->getAllFromStop($parameters);

      return json_encode($hoursData);
  }
  
  public function addHourToStop(Request $request, Application $app)
  {
    $parameters['idArret'] = $request->get('idArret');
    $stops = $app['repository.stop']->getAll();
        
    $data = array(
                'HOUR' => time(),
                'STOP' => '',
            );
        
        $form = $app['form.factory']->createBuilder(FormType::class, $data)
            ->add('STP', ChoiceType::class, array( 'choices' => $stops))
            ->add('HOUR', DateType::class, array(
                                    'widget' => 'choice',
                                    'input' => 'timestamp'))
            ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $test = $form->getData();
            $app['repository.bonus']->insert($test);
            
            return 1;
        }
        
        
        
        
        return $app['twig']->render('hours.form.html.twig', array('form' => $form->createView()));
  }


}
