<?php

require_once 'bootstrap.php';

/** @var Magento\AcceptanceTestFramework\Dummy $dummy */
$dummy = new Magento\AcceptanceTestFramework\DataGenerator\DataHandler('test');

$result = $dummy->persistData(['CustomerEntityTwo'], 'API');

print_r($result);
