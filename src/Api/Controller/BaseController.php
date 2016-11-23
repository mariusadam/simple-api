<?php

namespace Api\Controller;

use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig_Environment;

abstract class BaseController
{
    /**
     * @var \Silex\Application
     */
    private $app;

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getDbConnection()
    {
        return $this->app['db'];
    }

    /**
     * @param \Silex\Application $app
     *
     * @return BaseController
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * @return \Silex\Application
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @return Twig_Environment
     */
    public function getTwig()
    {
        return $this->app['twig'];
    }

    public function json($data = null, $status = 200, $json = false)
    {
        return new JsonResponse($data, $status, [], $json);
    }

    /**
     * @return Serializer
     */
    public function getSerializer()
    {
        return $this->app['serializer'];
    }
}