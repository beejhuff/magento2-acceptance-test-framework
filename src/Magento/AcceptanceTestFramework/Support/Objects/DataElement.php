<?php

namespace Magento\AcceptanceTestFramework\Support\Objects;

class DataElement
{
    public $elementName;
    public $elementValue;

    public function __construct($elementName, $elementValue)
    {
        $this->elementName = $elementName;
        $this->elementValue = $elementValue;
    }
}