<?php

namespace Test\Endpoint;

use GuzzleHttp\Psr7\Response;
use madmis\ExchangeApi\Endpoint\AbstractEndpoint;

/**
 * Class Endpoint
 * @package Test\Endpoint
 */
class Endpoint extends AbstractEndpoint
{
    /**
     * @param array $data
     * @return array
     */
    public function testProcessResponse(array $data)
    {
        $resp = new Response(200, [], json_encode($data));
        return $this->processResponse($resp);
    }

    /**
     * @param array $items
     * @param string $className
     * @return array|object[]
     */
    public function testDeserializeItems(array $items, string $className)
    {
        return $this->deserializeItems($items, $className);
    }

    /**
     * @param array $item
     * @param string $className
     * @return object
     */
    public function testDeserializeItem(array $item, string $className)
    {
        return $this->deserializeItem($item, $className);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return array
     */
    protected function sendRequest(string $method, string $uri, array $options = []): array
    {
        return [];
    }
}

