<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/paypaldonate.yaml',
    'modified' => 1555874228,
    'data' => [
        'name' => 'Paypal Donate',
        'description' => 'Make a paypal donate button in seconds.',
        'type' => 'particle',
        'icon' => 'fa-paypal',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable to the particles.',
                    'default' => true
                ],
                'email' => [
                    'type' => 'input.text',
                    'label' => 'Paypal email',
                    'description' => 'Enter your real and valid paypal email account on which you will receive the donations.'
                ],
                'name' => [
                    'type' => 'input.text',
                    'label' => 'Name',
                    'description' => 'Enter your name or your organization name.',
                    'placeholder' => 'Friends of the Park.'
                ],
                'campaign' => [
                    'type' => 'input.text',
                    'label' => 'Campaign Name',
                    'description' => 'Enter the campaign name.',
                    'placeholder' => 'Fall Cleanup Campaign'
                ],
                'currency' => [
                    'type' => 'select.select',
                    'label' => 'Currency',
                    'description' => 'Select currency.',
                    'default' => 'USD',
                    'options' => [
                        'USD' => 'US dollar',
                        'EUR' => 'Euro',
                        'GBP' => 'Pound sterling',
                        'JPY' => 'Japanese yen',
                        'AUD' => 'Australian dollar',
                        'BRL' => 'Brazilian real',
                        'CAD' => 'Canadian dollar',
                        'CZK' => 'Czech koruna',
                        'DKK' => 'Danish krone',
                        'HKD' => 'Hong Kong dollar',
                        'HUF' => 'Hungarian forint',
                        'ILS' => 'Israeli new shekel',
                        'MXN' => 'Mexican peso',
                        'TWD' => 'New Taiwan dollar',
                        'NZD' => 'New Zealand dollar',
                        'NOK' => 'Norwegian krone',
                        'PHP' => 'Philippine peso',
                        'PLN' => 'Polish złoty',
                        'RUB' => 'Russian ruble',
                        'SGD' => 'Singapore dollar',
                        'SEK' => 'Swedish krona',
                        'CHF' => 'Swiss franc',
                        'THB' => 'Thai baht'
                    ]
                ],
                'images' => [
                    'type' => 'select.select',
                    'label' => 'Button Image',
                    'description' => 'Select the image for button.',
                    'default' => 'pp1',
                    'options' => [
                        'pp1' => 'Paypal Donate',
                        'pp2' => 'Paypal Donate Now',
                        'pp3' => 'Donate',
                        'pp4' => 'Buy me a beer'
                    ]
                ],
                'image' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Custom Button Image',
                    'description' => 'Select your custom image for button, will overide Button Image if set.'
                ],
                'showamount' => [
                    'type' => 'input.checkbox',
                    'label' => 'Show amount',
                    'description' => 'Show the donation amount. If disable, donors will have to enter the amount in paypal site.'
                ],
                'fixedamount' => [
                    'type' => 'input.number',
                    'label' => 'Fixed amount',
                    'description' => 'Enter the fixed amount. If set, donors can not change the donation amount.'
                ],
                'creditcard' => [
                    'type' => 'input.checkbox',
                    'label' => 'Show creditcard logo',
                    'description' => 'Show credit card image logos.',
                    'default' => true
                ],
                'css.class' => [
                    'type' => 'input.selectize',
                    'label' => 'CSS Classes',
                    'description' => 'CSS class name for the particle.'
                ],
                'copyright' => [
                    'type' => 'separator.note',
                    'class' => 'alert alert-info',
                    'content' => 'Developed and maintained by <a href="https://www.joomlead.com/" target="_blank">JoomLead.com</a><br><strong>Version: 2.0.0</strong>'
                ]
            ]
        ]
    ]
];
