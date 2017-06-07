<?php

namespace Magento\AcceptanceTestFramework\Support\Objects;

class DataObject
{
    public $dataObjectName;
    public $dataElements = array();
    public $assertions = array();

    public function __construct($dataObjectName, $assertions, $dataElements)
    {
        $this->dataObjectName = $dataObjectName;
        $this->assertions = $assertions;

        foreach($dataElements as $key => $value)
        {
            $dataElement = new DataElement($key, $value);
            $this->dataElements[$dataElement->elementName] = $dataElement;
        }
    }

    public function getDataElement($key)
    {
        return $this->dataElements[$key];
    }

}