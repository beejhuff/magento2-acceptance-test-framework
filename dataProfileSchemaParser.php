<?php

require_once 'bootstrap.php';

$dummy = $objectManager->create(\Magento\AcceptanceTestFramework\DataProfileSchemaParser::class);
$dummy->readDataProfiles();
