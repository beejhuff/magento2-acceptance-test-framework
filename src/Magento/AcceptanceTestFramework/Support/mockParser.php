<?php

namespace Magento\AcceptanceTestFramework\Support;

class mockParser
{
    public static function parse()
    {
        return array (
            'basicCustomer' => array (
                'entityType' => 'Customer',
                'configs' => array (
                    'smoke', 'regression'
                ),
                'dataObjects' => array (
                    'personal' => array(
                        'data' => array(
                            'username' => 'smoke@magento.com',
                            'password' => 'smoke2017',
                        ),
                        'assertions' => array (
                            'AssertionA',
                            'AssertionB'
                        )
                    ),
                    'address' => array (
                        'data' => array (
                            'street' => '123 Magento Way',
                            'zip' => '78704'
                        ),
                        'assertions' => array (
                            'AssertionOne',
                            'AssertionTwo'
                        )
                    )

                )
            ),
            'basicCustomer2' => array (
                'entityType' => 'Customer',
                'configs' => array (
                    'custom'
                ),
                'dataObjects' => array (
                    'personal' => array(
                        'data' => array(
                            'username' => 'simple@magento.com',
                            'password' => 'simple2017',
                        ),
                        'assertions' => array (
                            'AssertionC',
                            'AssertionD'
                        )
                    ),
                    'address' => array (
                        'data' => array (
                            'street' => '123 Ebay Dr',
                            'zip' => '78705'
                        ),
                        'assertions' => array (
                            'AssertionThree',
                            'AssertionFour'
                        )
                    )

                )
            ));
    }
}