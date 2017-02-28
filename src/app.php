<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\FormServiceProvider;

$app = new Application();

// Ajout des fournisseurs de services
$app->register(new DoctrineServiceProvider());
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en_GB'),
));

$app->register(new FormServiceProvider());

//Ajout des repository
$app['repository.user'] = function ($app) {
    return new App\Users\Repository\UserRepository($app['db']);
};

$app['repository.stop'] = function ($app) {
    return new App\Stops\Repository\StopRepository($app['db']);
};

$app['repository.hour'] = function ($app) {
    return new App\Hours\Repository\HourRepository($app['db']);
};

$app['repository.line'] = function ($app) {
    return new App\Lines\Repository\LineRepository($app['db']);
};

$app['repository.linestop'] = function ($app) {
    return new App\LineStop\Repository\LineStopRepository($app['db']);
};
