<?php

namespace madmis\ExchangeApi\Endpoint;

use madmis\ExchangeApi\Client\ClientInterface;

/**
 * Interface EndpointInterface
 *
 * @package madmis\ExchangeApi\Endpoint
 */
interface EndpointInterface
{
    /**
     * @param ClientInterface $client
     * @param array $options
     */
    public function __construct(ClientInterface $client, array $options = []);
}
