<?php

/**
 * Created by PhpStorm.
 * User: kkozan
 * Date: 6/13/17
 * Time: 11:30 AM
 */
namespace Magento\AcceptanceTestFramework\DataGenerator\DataModel\ApiModel;

class Customer implements \Magento\AcceptanceTestFramework\DataGenerator\DataModel\EntityPersistenceInterface
{
    private $entityObject;
    public $json;
    private $specialDefinitions = ["address", "customattributes"];

    public function __construct($entityObject)
    {
        $this->entityObject = $entityObject;
        $this->createJson();
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * Generates Json from $entityObject's data array, then assigns $json to the result.
     */
    public function createJson()
    {
        $array = array();
        $data = $this->entityObject->data;
        $data = array_change_key_case($data, CASE_LOWER);

        foreach ($data as $key => $value) {
            if (in_array($key, $this->specialDefinitions))
            {
                // TODO: Implement data specific solution for special definitions. Something like switch statements dependant on the array declared above.
            }
            else
            {
                $array[$key] = $value;
            }
        }
        $entityArray = [
            strtolower($this->entityObject->type) => $array
        ];
        $json = \GuzzleHttp\json_encode($entityArray);
        $this->json = $json;
    }
}