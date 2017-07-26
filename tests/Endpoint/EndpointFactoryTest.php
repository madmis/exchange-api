<?php

namespace Test\Endpoint;

use madmis\ExchangeApi\Client\GuzzleClient;
use madmis\ExchangeApi\Endpoint\EndpointFactory;

class EndpointFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetEndpointError()
    {
        $factory = new EndpointFactory();
        $client = new GuzzleClient('', '', []);

        $factory->getEndpoint('test', $client);
    }
}
