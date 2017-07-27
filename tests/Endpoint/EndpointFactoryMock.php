<?php

namespace Test\Endpoint;

use madmis\ExchangeApi\Endpoint\EndpointFactory;
use madmis\ExchangeApi\Endpoint\EndpointInterface;

/**
 * Class EndpointFactoryMock
 * @package Test\Endpoint
 */
class EndpointFactoryMock extends EndpointFactory
{
    /**
     * @param string $classOrType
     * @param EndpointInterface $object
     */
    public function setEndpoint(string $classOrType, EndpointInterface $object)
    {
        $this->endpointList[$classOrType] = $object;
    }
}
