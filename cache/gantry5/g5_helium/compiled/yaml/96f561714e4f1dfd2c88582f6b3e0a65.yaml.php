<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/cookie-consent.yaml',
    'modified' => 1555874221,
    'data' => [
        'name' => 'Cookie Consent',
        'description' => 'Configure Cookie Consent atom.',
        'type' => 'atom',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable Cookie Consent particles.',
                    'default' => true
                ],
                'messagetext' => [
                    'type' => 'textarea.textarea',
                    'label' => 'Message Text',
                    'description' => 'Type in the message text.',
                    'placeholder' => 'This website uses cookies to ensure you get the best experience on our website.'
                ],
                'rmtext' => [
                    'type' => 'input.text',
                    'label' => 'Read More Text',
                    'description' => 'Type in the \'Read More\' text.',
                    'placeholder' => 'Read more...'
                ],
                'rmlink' => [
                    'type' => 'input.text',
                    'label' => 'Read More Link',
                    'description' => 'Type in the \'Read More\' URL.',
                    'placeholder' => 'http://example.com/policy'
                ],
                'target' => [
                    'type' => 'select.select',
                    'label' => 'Read More Target',
                    'description' => 'Target browser window when item is clicked.',
                    'placeholder' => 'Select...',
                    'default' => '_parent',
                    'options' => [
                        '_parent' => 'Self',
                        '_blank' => 'New Window'
                    ]
                ],
                'accepttext' => [
                    'type' => 'input.text',
                    'label' => 'Accept Button Text',
                    'description' => 'Type in the accept button text.',
                    'placeholder' => 'Got it!'
                ],
                'theme' => [
                    'type' => 'select.select',
                    'label' => 'Theme',
                    'description' => 'Select the theme you wish to use.',
                    'placeholder' => 'Select...',
                    'default' => 'dark-bottom',
                    'options' => [
                        'dark-bottom' => 'Dark Bottom',
                        'dark-top' => 'Dark Top',
                        'dark-floating' => 'Dark Floating',
                        'dark-floating-tada' => 'Dark Floating Tada',
                        'dark-inline' => 'Dark Inline',
                        'light-bottom' => 'Light Bottom',
                        'light-top' => 'Light Top',
                        'light-floating' => 'Light Floating'
                    ]
                ]
            ]
        ]
    ]
];
