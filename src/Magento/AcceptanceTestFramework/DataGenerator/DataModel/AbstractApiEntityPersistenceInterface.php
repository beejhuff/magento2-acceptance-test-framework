<?php

namespace Magento\AcceptanceTestFramework\DataGenerator\DataModel;


use GuzzleHttp\Client;

abstract class AbstractApiEntityPersistenceInterface implements EntityPersistenceInterface
{
    private static $guzzle_client;

    /**
     * Generates json body from $entityObject's data array.
     * @return string
     */
    abstract protected function getJsonBody();

    /**
     * Gets the specific request uri for the entity type
     * @return string
     */
    abstract protected function getRequestUri();

    public function __construct($entityObject)
    {
        if (!self::$guzzle_client)
        {
            self::$guzzle_client = new Client([
                'base_uri' => 'http://127.0.0.1:8080/rest/V1/',
                'timeout' => 30.0,
            ]);
        }
    }

    public function create()
    {
        $authString = 'Bearer ' . $this->getAuthToken();

        $response = self::$guzzle_client->request('PUT', $this->getRequestUri(), [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $authString
            ],
            'body' => $this->getJsonBody()
        ]);

        return $response;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    private function getAuthToken()
    {
        $jsonArray = json_encode(['username' => 'admin', 'password' => 'admin123']);

        $response = self::$guzzle_client->request('POST', 'integration/admin/token',
            ['headers' => [
                'Content-Type' => 'application/json'
            ],
                'body' => $jsonArray]);

        if ($response->getStatusCode() != 200)
        {
            throwException('Could not get admin token from service, please check logs.');
        }

        return str_replace('"', "",$response->getBody()->getContents());
    }

}