<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
//     add custom globals, filters, tags, ...

    return $twig;
});

require __DIR__.'/../config/prod.php';

$app->register(
    new Silex\Provider\DoctrineServiceProvider(),
    [
        'db.options' => [
            'driver'        => 'pdo_sqlite',
            'path'          => $app['db.path'],
            'dbname'        => $app['db.name'],
            'charset'       => 'utf8',
            'driverOptions' => [
                1002 => 'SET NAMES utf8',
            ],
        ],
    ]
);

return $app;
