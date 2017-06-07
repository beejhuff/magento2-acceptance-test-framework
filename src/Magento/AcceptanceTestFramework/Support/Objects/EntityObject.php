<?php

namespace Magento\AcceptanceTestFramework\Support\Objects;

class EntityObject
{
    const DATA = 'data';
    const ASSERTIONS = 'assertions';

    public $entityName;
    public $entityType;
    public $configs = array();
    public $dataObjects = array();

    public function __construct($entityName, $entityType, $configs, $dataObjects)
    {
        $this->entityName = $entityName;
        $this->entityType = $entityType;
        $this->configs = $configs;
        foreach ($dataObjects as $dataObjectName => $dataObject)
        {
            $this->dataObjects[] = new DataObject($dataObjectName, $dataObject[self::ASSERTIONS], $dataObject[self::DATA]);
        }
    }

    public function entityHasConfiguration($config)
    {
        return in_array($config, $this->configs);
    }
}