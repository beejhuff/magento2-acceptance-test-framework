<?php

namespace Magento\AcceptanceTestFramework\Support;

use Magento\AcceptanceTestFramework\Support\Objects\EntityObject;
use Magento\AcceptanceTestFramework\Support\Objects\DataObject;

class SampleTestRunner extends \Magento\AcceptanceTestFramework\Support\Runner\AbstractTestRunner
{
    protected function getModule()
    {
        return 'sample';
    }

    /**
     * @param EntityObject $data
     */
    protected function runTests($data)
    {
        print 'Entity name is: ' . $data->entityName;
        print "\n";
        print 'Entity type is: ' . $data->entityType;
        print "\n";
        foreach ($data->configs as $config)
        {
            print 'Entity is configured for ' . $config;
            print "\n";
        }

        print "\n";
        print 'Entity contains ' . count($data->dataObjects) . ' data objects';
        print "\n\t";

        foreach ($data->dataObjects as $dataObject)
        {
            print 'Data Object is named ' . $dataObject->dataObjectName;
            print "\n";

            foreach ($dataObject->dataElements as $dataElement)
            {
                print "\t";
                print 'Data Object contains data element: ' . $dataElement->elementName . ' with value of: ' . $dataElement->elementValue;
                print"\n";
            }

            foreach ($dataObject->assertions as $assertion)
            {
                print "\t";
                print 'Data Object contains assertion: ' . $assertion;
                print"\n";
            }
        }
        print "********************************************************************";
        print "\n\n";

    }
}