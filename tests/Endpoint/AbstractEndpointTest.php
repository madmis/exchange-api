<?php

namespace Test\Endpoint;

use madmis\ExchangeApi\Client\GuzzleClient;
use madmis\ExchangeApi\Endpoint\AbstractEndpoint;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractEndpointTest
 * @package Test\Endpoint
 */
class AbstractEndpointTest extends TestCase
{
    public function testGetApiUrn()
    {
        $client = new GuzzleClient('http://localhost', '/api/v2', []);

        $endpoint = new Endpoint($client, []);

        static::assertEquals('/api/v2', $endpoint->getApiUrn());
        static::assertEquals('/api/v2', $endpoint->getApiUrn(['/']));
        static::assertEquals('/api/v2/test', $endpoint->getApiUrn(['/test']));
        static::assertEquals('/api/v2/test/ac', $endpoint->getApiUrn(['/test/', 'ac/']));
    }

    public function testProcessResponse()
    {
        $client = new GuzzleClient('http://localhost', '/api/v2', []);
        $endpoint = new Endpoint($client);

        $data = ['item1' => '1 item', 'item2' => '2 item'];
        static::assertEquals($data, $endpoint->testProcessResponse($data));
    }

    public function testDeserializeItems()
    {
        $client = new GuzzleClient('http://localhost', '/api/v2', []);
        $endpoint = new Endpoint($client);

        /** @var TestModel[] $object */
        $result = $endpoint->testDeserializeItems([
            ['id' => 1, 'name' => 'Response', 'date' => '2017-07-26 17:40:10'],
            ['id' => 2, 'name' => 'Response 2', 'date' => '2017-07-27 17:40:10'],
        ], TestModel::class);

        static::assertInternalType('array', $result);
        static::assertInstanceOf(TestModel::class, $result[0]);
    }

    public function testDeserializeItem()
    {
        $client = new GuzzleClient('http://localhost', '/api/v2', []);
        $endpoint = new Endpoint($client);

        /** @var TestModel $object */
        $object = $endpoint->testDeserializeItem([
            'id' => 1,
            'name' => 'Response',
            'date' => '2017-07-26 17:40:10',
        ], TestModel::class);


        static::assertInstanceOf(TestModel::class, $object);
        static::assertInstanceOf(\DateTime::class, $object->getDate());
        static::assertEquals(1, $object->getId());
        static::assertEquals('Response', $object->getName());
        static::assertEquals('2017-07-26 17:40:10', $object->getDate()->format('Y-m-d H:i:s'));
    }
}

class TestModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \Datetime
     */
    protected $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \string $date
     */
    public function setDate(string $date): void
    {
        $this->date = new \DateTime($date);
    }
}
