<?php

namespace Magento\AcceptanceTestFramework\DataGenerator\DataModel\ApiModel;

use Magento\AcceptanceTestFramework\DataGenerator\DataModel\EntityPersistenceInterface;
use Magento\AcceptanceTestFramework\Helper\EntityRESTApiHelper;

class Customer implements EntityPersistenceInterface
{
    private $entityObject;
    private $entityRESTApiHelper;
    private static $specialDefinitions = ["address", "customattributes"];

    const CUSTOMER_CREATE_API_PATH = '/rest/V1/customers/1';

    public function __construct($entityObject)
    {
        $this->entityObject = $entityObject;
        $this->entityRESTApiHelper = new EntityRESTApiHelper(getenv('HOSTNAME'), getenv('PORT'));
    }

    public function create()
    {
        $response = $this->entityRESTApiHelper->submitAuthAPiRequest(
            'PUT',
            self::CUSTOMER_CREATE_API_PATH,
            $this->getJsonBody(),
            EntityRESTApiHelper::APPLICATION_JSON_HEADER
        );

        return $response;
    }

    public function delete()
    {
        // TODO use delete method;
    }

    private function getJsonBody()
    {
        $data = $this->entityObject->getData();

        foreach (self::$specialDefinitions as $specialKey) {
            if (array_key_exists($specialKey, $data)) {
                // logic to handle special case (new obj?)
            }
        }

        $entityArray = [
            strtolower($this->entityObject->getType()) => $data,
            'passwordHash' => 'someHash'];
        $json = \GuzzleHttp\json_encode($entityArray);

        return $json;
    }
}
