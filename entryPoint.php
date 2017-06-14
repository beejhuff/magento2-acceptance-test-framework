<?php

require_once 'bootstrap.php';

/** @var Magento\AcceptanceTestFramework\Dummy $dummy */
$dummy = new Magento\AcceptanceTestFramework\DataGenerator\DataHandler('test');
$results = $dummy->generateData();

//print_r($results[0]);
$array = [
    'CustomerEntityTwo'
];
$result = $dummy->apiData($array);

print_r($result);


/**
$custo = new Magento\AcceptanceTestFramework\DataGenerator\DataModel\ApiModel\Customer($results[0]);
$results2 = $custo->json;

print_r($results2);
 */