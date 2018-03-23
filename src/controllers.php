<?php

use Symfony\Component\HttpFoundation\Request;

$app->match('/api/v1/health', 'App\Controllers\HealthController::healthCheck')
    ->bind('health');

$app->match('/', function (Request $request, \Silex\Application $app) {
    return $app->json([
        'version' => 'v1',
        'baseUrl' => $request->getHost().'/api/v1',
        'status'  => 'OK',
    ]);
})->bind('homepage');

if (!$app->get('dispatcher')) {
    $app->error(function (\Exception $e, Request $request, $code) use ($app) {
        if ($app['debug']) {
            return;
        }

        if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            return $app->json([
                'status'  => 'ERROR',
                'message' => $e->getMessage(),
            ])->setStatusCode($e->getStatusCode());
        }

        if ($e instanceof \Symfony\Component\Routing\Exception\RouteNotFoundException) {
            return $app->json([
                'status'  => 'ERROR',
                'message' => 'Page not found',
            ])->setStatusCode(404);
        }

        return $app->json([
            'status'  => 'ERROR',
            'message' => 'Internal server error',
        ])
            ->setStatusCode(500);
    });
}
