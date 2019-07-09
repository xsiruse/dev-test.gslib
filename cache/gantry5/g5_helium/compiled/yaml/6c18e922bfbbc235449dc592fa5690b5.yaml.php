<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/warningmessage.yaml',
    'modified' => 1555874234,
    'data' => [
        'name' => 'Warning Message',
        'description' => 'Show a warning message when vistor enter the page',
        'type' => 'atom',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable to the particles.',
                    'default' => true
                ],
                'title' => [
                    'type' => 'input.text',
                    'label' => 'Title',
                    'default' => 'Warning',
                    'description' => 'Customize the title text.'
                ],
                'icon' => [
                    'type' => 'input.icon',
                    'label' => 'Icon',
                    'description' => 'Select the icon you would like to use.',
                    'default' => 'fa-warning'
                ],
                'content' => [
                    'type' => 'textarea.textarea',
                    'label' => 'Content',
                    'default' => '<center><h2>Wanning Message</h2></center><p>Gantry 5 is the most customizable and powerful version of the framework yet. Packed full of features such as drag-and-drop layout creation and the powerful particle system, Gantry 5 has been designed from the ground up to be lightning fast and hassle free.</p>',
                    'description' => 'Custom HTML content here'
                ],
                'enter' => [
                    'type' => 'input.text',
                    'label' => 'Enter text',
                    'default' => 'I do understand. Let me in',
                    'description' => 'Customize the text of enter button.'
                ],
                'exit' => [
                    'type' => 'input.text',
                    'label' => 'Exit text',
                    'default' => 'Get me out of here! Now',
                    'description' => 'Customize the text of exit button.'
                ],
                'exitadd' => [
                    'type' => 'input.text',
                    'label' => 'Exit address',
                    'default' => 'http://google.com',
                    'description' => 'Customize the address of exit button.'
                ],
                'mode' => [
                    'type' => 'select.select',
                    'label' => 'Show mode',
                    'description' => 'Select the mode.',
                    'default' => 2,
                    'options' => [
                        1 => 'Show everytime vistor come here',
                        2 => 'Show for this season',
                        3 => 'Show only for the first time visit'
                    ]
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
