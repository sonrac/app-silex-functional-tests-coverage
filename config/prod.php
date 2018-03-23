<?php

// configure your app for the production environment

$app['twig.path'] = array(__DIR__.'/../resources/templates');
$app['twig.options'] = array('cache' => __DIR__.'/../resources/cache/twig');

$path = env('DB_PATH', __DIR__.'/../resources/db.sqlite');

if (!empty($path) && !is_file($path)) {
    $dir = dirname($path);
    if (!$dir) {
        $dir = __DIR__.'/../resources/';
    } else {
        if (!is_dir($dir)) {
            $dir = __DIR__.'/../'.$dir;
        }
    }

    $path = $dir.'/'.basename($path);
}

if (!file_exists($path)) {
    file_put_contents($path, '');
}

$app['db.path'] = $path;
$app['db.name'] = env('DB_NAME', 'test-app');
