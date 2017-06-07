<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\AcceptanceTestFramework;

use Magento\AcceptanceTestFramework\Config\DataInterface;

class DataProfileSchemaParser
{
    public function __construct(DataInterface $dataProfiles)
    {
        $this->dataProfiles = $dataProfiles;
    }

    public function readDataProfiles()
    {
        $foo = $this->dataProfiles->get();
        var_dump($foo);
    }
}
