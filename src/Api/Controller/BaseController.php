<?php

namespace Api\Controller;

use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @param null $data
     * @param int  $status
     * @param bool $json
     *
     * @return JsonResponse
     */
    public function json($data = null, $status = 200, $json = false)
    {
        if (!$json) {
            $data = $this->getSerializer()->serialize($data, 'json');
        }
        return new JsonResponse($data, $status, [], true);
    }

    /**
     * @param null $data
     * @param int  $status
     * @param bool $xml
     *
     * @return Response
     */
    public function xml($data = null, $status = 200, $xml = false)
    {
        if (!$xml) {
            $data = $this->getSerializer()->serialize($data, 'xml');
        }
        $response = new Response($data, $status);
        $response->headers->add(['Content-Type' => 'application/xml']);

        return $response;
    }

    /**
     * @return Serializer
     */
    public function getSerializer()
    {
        return $this->app['serializer'];
    }
}