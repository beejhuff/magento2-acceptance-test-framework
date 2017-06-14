<?php

namespace Magento\AcceptanceTestFramework\DataGenerator\DataModel\ApiModel;

use Magento\AcceptanceTestFramework\DataGenerator\DataModel\AbstractApiEntityPersistenceInterface;

class Customer extends AbstractApiEntityPersistenceInterface
{
    private $entityObject;
    private static $specialDefinitions = ["address", "customattributes"];

    public function __construct($entityObject)
    {
        $this->entityObject = $entityObject;
        parent::__construct($entityObject);
    }

    protected function getJsonBody()
    {
        $data = $this->entityObject->getData();

        foreach(self::$specialDefinitions as $specialKey)
        {
            if(array_key_exists($specialKey, $data))
            {
                // logic to handle special case (new obj?)
            }
        }


        $entityArray = [
            strtolower($this->entityObject->getType()) => $data,
            'passwordHash' => 'someHash'
        ];
        $json = \GuzzleHttp\json_encode($entityArray);

        return $json;
    }

    /**
     * @return string
     */
    protected function getRequestUri()
    {
        return 'customers/1';
    }
}