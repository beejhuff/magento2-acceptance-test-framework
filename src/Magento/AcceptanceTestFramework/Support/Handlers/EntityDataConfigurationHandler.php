<?php

namespace Magento\AcceptanceTestFramework\Support\Handlers;

use Magento\AcceptanceTestFramework\Support\Objects\EntityObject;

class EntityDataConfigurationHandler
{
    const CONFIGS = 'configs';
    const DATA_OBJECTS = 'dataObjects';
    const ENTITY_TYPE = 'entityType';

    public static function fetchData($entityName, $entityConfig)
    {
        return new EntityObject($entityName, $entityConfig[self::ENTITY_TYPE], $entityConfig[self::CONFIGS], $entityConfig[self::DATA_OBJECTS]);
    }
}