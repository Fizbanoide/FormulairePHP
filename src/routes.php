<?php

$app->get('/users/listall', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');
$app->get('/users/auth', 'App\Users\Controller\IndexController::authAction')->bind('users.auth');

$app->get('/stops/listall', 'App\Stops\Controller\IndexController::listAll')->bind('stops.listAll');
$app->get('/stops/getbyname', 'App\Stops\Controller\IndexController::getStop')->bind('stops.get');
$app->get('/stops/listallfromline', 'App\Stops\Controller\IndexController::listAllFromLine')->bind('stops.listAllFromLine');
$app->get('/stops/itinary', 'App\Stops\Controller\IndexController::itinary')->bind('stops.get');

$app->get('/hours/listall', 'App\Hours\Controller\IndexController::listAll')->bind('hours.listAll');
