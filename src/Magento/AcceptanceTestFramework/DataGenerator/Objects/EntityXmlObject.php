<?php
/**
 * Created by PhpStorm.
 * User: imeron
 * Date: 6/9/17
 * Time: 11:50 AM
 */

namespace Magento\AcceptanceTestFramework\DataGenerator\Objects;


use Magento\AcceptanceTestFramework\DataGenerator\DataGeneratorXMLConstants;

class EntityXmlObject
{
    public $name;
    public $type;
    public $dataConfigs = array();
    public $dataObjects = array(); //array of data objects map of DataObject Name to actual Data Name
    public $data = array(); //array of Data Name to Data Value


    function __construct($entityName, $entityType, $dataConfigs, $dataObjects)
    {
        $this->name = $entityName;
        $this->type = $entityType;

        foreach ($dataConfigs as $dataConfig)
        {
            $this->dataConfigs[] = $dataConfig[DataGeneratorXMLConstants::DATA_CONFIG_VALUE];
        }

        foreach ($dataObjects as $dataObjectName => $dataObject)
        {
            $dataNames = array(); // array to store names of data per dataObject
            $assertions = array(); // array to store assertions

            foreach($dataObject[DataGeneratorXMLConstants::DATA_OBJECT_DATA] as $dataElement)
            {
                $dataNames[] = $dataElement[DataGeneratorXMLConstants::DATA_ELEMENT_KEY];
                $this->data[$dataElement[DataGeneratorXMLConstants::DATA_ELEMENT_KEY]] = $dataElement[DataGeneratorXMLConstants::DATA_ELEMENT_VALUE];
            }

            foreach($dataObject[DataGeneratorXMLConstants::DATA_OBJECT_ASSERTS] as $assertion)
            {
                $assertions[] = $assertion[DataGeneratorXMLConstants::ASSERT_VALUE];
            }


            $dataXmlObject = new DataXmlObject($dataObjectName, $assertions, $dataNames);
            $this->dataObjects[$dataXmlObject->name] = $dataXmlObject;
        }
    }

}