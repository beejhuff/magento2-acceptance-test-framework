<?php
/**
 * Created by PhpStorm.
 * User: imeron
 * Date: 6/9/17
 * Time: 11:30 AM
 */

namespace Magento\AcceptanceTestFramework\DataGenerator;

use Magento\AcceptanceTestFramework\DataGenerator\Objects\EntityXmlObject;
use Magento\AcceptanceTestFramework\DataProfileSchemaParser;
use Magento\AcceptanceTestFramework\ObjectManagerFactory;

class DataHandler
{
    private $moduleName;
    private $objectManager;

    public function __construct($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    public function generateData($mapEntities = false)
    {
        $entityObjects = array();
        $this->objectManager = ObjectManagerFactory::getObjectManager();
        $entityParser = $this->objectManager->create(DataProfileSchemaParser::class);
        $entities = $entityParser->readDataProfiles();

        foreach ($entities[DataGeneratorXMLConstants::ENTITY_DATA] as $entityName => $entity)
        {
           $entityXmlObject = new EntityXmlObject($entityName, $entity[DataGeneratorXMLConstants::ENTITY_DATA_TYPE],
               $entity[DataGeneratorXMLConstants::ENTITY_DATA_CONFIG], $entity[DataGeneratorXMLConstants::DATA_OBJECT]);

            if ($mapEntities)
            {
                $entityObjects[$entityXmlObject->name] = $entityXmlObject;
            }
            else
            {
                $entityObjects[] = $entityXmlObject;
            }
        }

        return $entityObjects;
    }

    public function persistData($entityNames)
    {
        $entityObjects = $this->generateData(true);
        $relevantEntities = array_intersect_key($entityObjects, array_flip($entityNames));

        foreach ($relevantEntities as $relevantEntity)
        {
            //magic to persist entity
        }

    }

}