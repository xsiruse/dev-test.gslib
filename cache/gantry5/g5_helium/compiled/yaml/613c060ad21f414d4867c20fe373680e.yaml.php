<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/youtube.yaml',
    'modified' => 1555874235,
    'data' => [
        'name' => 'Youtube',
        'description' => 'Reponsive youtube video embed',
        'type' => 'particle',
        'icon' => 'fa-youtube',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable to the particles.',
                    'default' => true
                ],
                'type' => [
                    'type' => 'select.select',
                    'label' => 'Type',
                    'description' => 'Select video type',
                    'default' => 1,
                    'options' => [
                        1 => 'Default',
                        2 => 'Lightbox'
                    ]
                ],
                'poster' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Video Poster',
                    'description' => 'Select the video poster (only need for lightbox)'
                ],
                'id' => [
                    'type' => 'input.text',
                    'label' => 'Video ID',
                    'description' => 'Enter the ID. https://www.youtube.com/watch?v=ID. Example: ID of https://www.youtube.com/watch?v=bMv_4enya6E is bMv_4enya6E',
                    'placeholder' => 'Enter the video id'
                ],
                'fullscreen' => [
                    'type' => 'input.checkbox',
                    'label' => 'Fullscreen',
                    'description' => 'Allow full screen.',
                    'default' => false
                ],
                'autoplay' => [
                    'type' => 'input.checkbox',
                    'label' => 'Autoplay',
                    'description' => 'Enable video autoplay.',
                    'default' => false
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
