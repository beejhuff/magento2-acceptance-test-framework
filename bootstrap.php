<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

defined('BP') || define('BP', str_replace('\\', '/', (__DIR__)));
putenv("HOSTNAME=127.0.0.1");
putenv("PORT=8080");

require_once __DIR__ . '/vendor/autoload.php';

$objectManager = \Magento\AcceptanceTestFramework\ObjectManagerFactory::getObjectManager();