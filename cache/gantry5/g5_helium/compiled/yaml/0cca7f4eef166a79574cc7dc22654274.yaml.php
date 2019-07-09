<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/video.yaml',
    'modified' => 1555874233,
    'data' => [
        'name' => 'video',
        'description' => 'Video player',
        'type' => 'particle',
        'icon' => 'fa-play',
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
                    'description' => 'Customize the section title text.'
                ],
                'url' => [
                    'type' => 'input.text',
                    'label' => 'Url',
                    'description' => 'Customize the url of video.'
                ],
                'poster' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Poster',
                    'description' => 'Customize the poster of video.'
                ],
                'autoplay' => [
                    'type' => 'input.checkbox',
                    'label' => 'AutoPlay',
                    'description' => 'Auto play video.',
                    'default' => false
                ],
                'loop' => [
                    'type' => 'input.checkbox',
                    'label' => 'Loop',
                    'description' => 'Auto loop video.',
                    'default' => false
                ],
                'class' => [
                    'type' => 'input.text',
                    'label' => 'Class',
                    'description' => 'CSS class name for the particle.'
                ],
                'copyright' => [
                    'type' => 'separator.note',
                    'class' => 'alert alert-info',
                    'content' => 'Developed and maintained by <a href="https://www.joomlead.com/" target="_blank">JoomLead.com</a><br><strong>Version: 1.0.0</strong>'
                ]
            ]
        ]
    ]
];
