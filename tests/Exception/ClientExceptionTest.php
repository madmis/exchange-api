<?php

namespace Test\Exception;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use madmis\ExchangeApi\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class ClientExceptionTest extends TestCase
{
    public function testHasResponse()
    {
        $request = new Request('GET', '/');
        $response = new Response();
        $e = new ClientException(new \RuntimeException(), $request, $response);

        static::assertNotNull($e->getResponse());
        static::assertTrue($e->hasResponse());
    }

    public function testHasRequest()
    {
        $request = new Request('GET', '/');
        $e = new ClientException(new \RuntimeException(), $request);

        static::assertNotNull($e->getRequest());
    }
}
