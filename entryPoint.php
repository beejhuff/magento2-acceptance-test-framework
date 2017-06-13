<?php

require_once 'bootstrap.php';

/** @var Magento\AcceptanceTestFramework\Dummy $dummy */
$dummy = new Magento\AcceptanceTestFramework\DataGenerator\DataHandler('test');
$results = $dummy->generateData();

print_r($results);