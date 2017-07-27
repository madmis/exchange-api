<?php

namespace Test\Client;

use madmis\ExchangeApi\Client\GuzzleClient;
use madmis\ExchangeApi\Exception\ClientException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class GuzzleClientTest extends TestCase
{
    public function testGetOption()
    {
        $client = new GuzzleClient('http://localhost:8000/', '/', ['first' => 1]);

        static::assertEquals(1, $client->getOption('first'));
        static::assertNull($client->getOption('second'));
    }

    public function testCreateRequest()
    {
        $client = new GuzzleClient('http://localhost:8000/', '/', ['first' => 1]);
        $request = $client->createRequest('GET', '/me');

        static::assertInstanceOf(RequestInterface::class, $request);
    }

    /**
     * expectedException ClientException
     */
    public function testSendError()
    {
        $client = new GuzzleClient('http://localhost:8000/', '/', ['first' => 1]);
        $request = $client->createRequest('GET', '/response_404');

        try {
            $client->send($request);
        } catch (ClientException $e) {
        }

        static::assertNotNull($client->getLastRequest());
        static::assertNotNull($client->getLastResponse());
        static::assertEquals(404, $client->getLastResponse()->getStatusCode());

    }

    public function testSend()
    {
        $client = new GuzzleClient('http://localhost:8000/', '/', ['first' => 1]);

        $request = $client->createRequest('GET', '/');
        $client->send($request);

        static::assertNotNull($client->getLastRequest());
        static::assertNotNull($client->getLastResponse());
        static::assertEquals(200, $client->getLastResponse()->getStatusCode());
    }
}