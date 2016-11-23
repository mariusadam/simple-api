<?php

use Api\Controller\EmployeeController;
use Pimple\Container;
use Silex\Application;

/** @var Application $app */

$app['employee.controller'] = function () use ($app) {
    $indexController = new EmployeeController();
    $indexController->setApp($app);

    return $indexController;
};

$app['serializer'] = function () use ($app) {
    $serializer = \JMS\Serializer\SerializerBuilder::create()
        ->addMetadataDir(__DIR__.'/Api/Resources/serializer')
        ->setCacheDir($app['params']['cache_dir'])
        ->setDebug($app['debug'])
        ->build()
    ;

    return $serializer;
};
