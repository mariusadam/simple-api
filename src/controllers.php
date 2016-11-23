<?php

use Api\Entity\Employee;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

require_once __DIR__.'/services.php';

//Request::setTrustedProxies(array('127.0.0.1'));
/** @var \Silex\Application $app */

$app
    ->post('/employee', 'employee.controller:createAction')
    ->bind('create_employee')
;

$app->get('/swagger.json', function (){
    $swagger = \Swagger\scan(__DIR__.'/../vendor/zircote/swagger-php/Examples/swagger-spec/petstore-with-external-docs');
    return new JsonResponse($swagger, 200, [], true);
});

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $app['monolog']->addError($e->getMessage());
    $app['monolog']->addError($e->getTraceAsString());
    return new JsonResponse(array('code' => $code, 'message' => $e->getMessage()));
});
