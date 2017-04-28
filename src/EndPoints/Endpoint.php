<?php

namespace seregazhuk\HeadHunterApi\EndPoints;

use seregazhuk\HeadHunterApi\Request;

abstract class Endpoint
{
    const RESOURCE = '/resource';

    /**
     * @var EndpointsContainer
     */
    protected $container;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param EndpointsContainer $container
     */
    public function __construct(EndpointsContainer $container)
    {
        $this->container = $container;
        $this->request = $this->container->getRequest();
    }

    /**
     * @param string $verb
     * @param array $params
     * @return array
     */
    protected function getResource($verb = '', array $params = [])
    {
        return $this->request->get(
            $this->getResourceUri($verb), $params
        );
    }

    /**
     * @param string $verb
     * @param array $params
     * @return mixed
     */
    protected function postResource($verb = '', array $params = [])
    {
        return $this->request->post(
            $this->getResourceUri($verb), $params
        );
    }

    /**
     * @param string $verb
     * @param array $params
     * @return mixed
     */
    protected function postResourceJson($verb = '', array $params = [])
    {
        return $this->request->postJson(
            $this->getResourceUri($verb), $params
        );
    }

    protected function postResourceFile($verb, array $params = [])
    {
        return $this->request->postFile(
            $this->getResourceUri($verb), $params
        );
    }


    /**
     * @param string $verb
     * @param array $params
     * @return mixed
     */
    protected function putResource($verb = '', array $params = [])
    {
        return $this->request->put(
            $this->getResourceUri($verb), $params
        );
    }

    /**
     * @param string $verb
     */
    protected function deleteResource($verb = '')
    {
        $this->request->delete($this->getResourceUri($verb));
    }

    /**
     * @param string $uri
     * @return string
     */
    protected function getResourceUri($uri = '')
    {
        $resource = static::RESOURCE;

        return empty($uri) ? $resource : $resource . sprintf('/%s', $uri);
    }
}