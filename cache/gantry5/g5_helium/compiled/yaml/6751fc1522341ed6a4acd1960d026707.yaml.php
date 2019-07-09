<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/blueprints/styles/menu.yaml',
    'modified' => 1555874050,
    'data' => [
        'name' => 'Menu',
        'description' => 'Set menu style configuration options.',
        'type' => 'configuration',
        'form' => [
            'fields' => [
                'col-width' => [
                    'type' => 'input.text',
                    'label' => 'Simple Dropdown Width',
                    'description' => 'Specify the default width of menu dropdowns for simple mode in rem, em or px units. This width can be overridden on each individual menu item from the menu editor.',
                    'default' => '180px',
                    'pattern' => '\\d+(\\.\\d+){0,1}(rem|em|px)'
                ],
                'animation' => [
                    'type' => 'select.select',
                    'label' => 'Dropdown Animation',
                    'description' => 'Select the dropdown animation.',
                    'default' => 'g-fade',
                    'options' => [
                        'g-no-animation' => 'No Animation',
                        'g-fade' => 'Fade',
                        'g-zoom' => 'Zoom',
                        'g-fade-in-up' => 'Fade In Up',
                        'g-dropdown-bounce-in-down' => 'Bounce In Down',
                        'g-dropdown-bounce-in-left' => 'Bounce In Left',
                        'g-dropdown-bounce-in-right' => 'Bounce In Right'
                    ]
                ]
            ]
        ]
    ]
];
