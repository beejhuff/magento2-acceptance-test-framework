<?php

namespace Magento\AcceptanceTestFramework\DataGenerator\Objects;


class DataXmlObject
{
    public $name;
    public $assertions = array(); // Array of assertions
    public $dataNames = array(); // Array of data names

    function __construct($dataObjectName, $assertions, $data)
    {
        $this->name = $dataObjectName;
        $this->assertions = $assertions;
        $this->dataNames = $data;
    }

}