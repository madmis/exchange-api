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

    public function testGetEndpoint()
    {
        $factory = new EndpointFactoryMock();
        $client = new GuzzleClient('', '', []);

        $factory->setEndpoint('public', new Endpoint($client));
        $actual = $factory->getEndpoint('public', $client);
        $this->assertInstanceOf(Endpoint::class, $actual);

        $factory->setEndpoint(Endpoint::class, new Endpoint($client));
        $actual = $factory->getEndpoint(Endpoint::class, $client);
        $this->assertInstanceOf(Endpoint::class, $actual);
    }
}
