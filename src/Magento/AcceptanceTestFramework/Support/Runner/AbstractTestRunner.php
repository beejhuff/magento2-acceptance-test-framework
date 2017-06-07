<?php

namespace Magento\AcceptanceTestFramework\Support\Runner;

use ReflectionClass;
use Magento\AcceptanceTestFramework\Support\mockParser;
use Magento\AcceptanceTestFramework\Support\Handlers\EntityDataConfigurationHandler;

abstract class AbstractTestRunner
{
    /**
     * Path to runner class location
     * @var string
     */
    private $dataFilePath;

    /**
     * AbstractTestRunner constructor. Initializes the path to the module.
     */
    public function __construct()
    {
        $reflector = new ReflectionClass(get_class($this));
        $filename = $reflector->getFileName();
        $this->dataFilePath = dirname($filename);
    }

    /**
     * This will return the name of the module which identifies the .xml file with relevant data.
     * @return string
     */
    abstract protected function getModule();

    /**
     * Defines which tests to run in scope of the test runner.
     * @param $data
     * @return mixed
     */
    abstract protected function runTests($data);

    /**
     * constructor which will execute all tests and setup data with configuration input.
     */
    public function execute()
    {
        $xmlDataFile = $this->dataFilePath . '/' . $this->getModule() .'.xml';
        if (file_exists($xmlDataFile))
        {
            // User a mockParser class returning the expected data array from the parser
            $entityConfigurations = mockParser::parse($xmlDataFile);

            // Read array into entity objects and pass to tests to use as runnable data
            foreach ($entityConfigurations as $entityName => $entityConfiguration)
            {
                $data = EntityDataConfigurationHandler::fetchData($entityName, $entityConfiguration);
                $this->runTests($data);
            }

        }
    }
}