<?php

$app->get('/users/listall', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');
$app->get('/users/auth', 'App\Users\Controller\IndexController::authAction')->bind('users.auth');

$app->get('/stops/listall', 'App\Stops\Controller\IndexController::listAll')->bind('stops.listAll');
$app->get('/stops/getbyid', 'App\Stops\Controller\IndexController::getStopById')->bind('stops.getStopById');
$app->get('/stops/listallfromline', 'App\Stops\Controller\IndexController::listAllFromLine')->bind('stops.listAllFromLine');
$app->get('/stops/itinary', 'App\Stops\Controller\IndexController::itinary')->bind('stops.itinary');
$app->get('/stops/gethour', 'App\Stops\Controller\IndexController::getHour')->bind('stops.gethour');

$app->get('/hours/listall', 'App\Hours\Controller\IndexController::listAll')->bind('hours.listAll');
$app->get('/hours/listallfromstop', 'App\Hours\Controller\IndexController::listAllFromStop')->bind('hours.listAllFromStop');
$app->get('/hours/addhourtostop', 'App\Hours\Controller\IndexController::addHourToStop')->bind('hours.add');
$app->post('/addHourToStopPost', 'App\Hours\Controller\IndexController::addHourToStop')->bind('hours.addPost');

$app->get('/lines/listall', 'App\Lines\Controller\IndexController::listAll')->bind('lines.list');
