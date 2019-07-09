<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/imagecompare.yaml',
    'modified' => 1555874226,
    'data' => [
        'name' => 'Image Compare',
        'description' => 'Compare two images',
        'type' => 'particle',
        'icon' => 'fa-picture-o',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable to the particles.',
                    'default' => true
                ],
                'image1' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Image 1',
                    'description' => 'Select the first image.'
                ],
                'label1' => [
                    'type' => 'input.text',
                    'label' => 'Title 1',
                    'description' => 'Customize the label of image 1 (Optional).',
                    'placeholder' => 'Before'
                ],
                'image2' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Image 2',
                    'description' => 'Select the second image.'
                ],
                'label2' => [
                    'type' => 'input.text',
                    'label' => 'Title 2',
                    'description' => 'Customize the label of image 2 (Optional).',
                    'placeholder' => 'After'
                ],
                'mode' => [
                    'type' => 'select.selectize',
                    'label' => 'Vertical',
                    'description' => 'Customize the drag mode.',
                    'default' => 0,
                    'options' => [
                        0 => 'Horizontal',
                        1 => 'Vertical'
                    ]
                ],
                'css.class' => [
                    'type' => 'input.selectize',
                    'label' => 'CSS Classes',
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
