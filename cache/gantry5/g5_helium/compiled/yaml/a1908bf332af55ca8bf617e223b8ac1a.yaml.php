<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/imagezoom.yaml',
    'modified' => 1555874226,
    'data' => [
        'name' => 'Image Zoom',
        'description' => 'Image Zooom',
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
                'image' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Image',
                    'description' => 'Select the main image.'
                ],
                'zoomimage' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Zoom Image',
                    'description' => 'Select the larger image to zoom (Optional but recommend for better zoom quality).'
                ],
                'width' => [
                    'type' => 'input.text',
                    'label' => 'Width',
                    'description' => 'Set the width of image dipslay (Required unless you are using zoomimage).'
                ],
                'height' => [
                    'type' => 'input.text',
                    'label' => 'Height',
                    'description' => 'Set the height of image dipslay (Required unless you are using zoomimage).'
                ],
                'mode' => [
                    'type' => 'select.selectize',
                    'label' => 'Mode',
                    'description' => 'Customize the drag mode.',
                    'default' => 'Window',
                    'options' => [
                        'window' => 'Window zoom',
                        'inner' => 'Inner zoom',
                        'lens' => 'Lens zoom'
                    ]
                ],
                'position' => [
                    'type' => 'input.number',
                    'label' => 'Position(Window only)',
                    'description' => 'Customize zoom window position (follow clock direction from 1-12).',
                    'min' => 1,
                    'max' => 12,
                    'default' => 1
                ],
                'tints' => [
                    'type' => 'input.checkbox',
                    'label' => 'Tints(Window only)',
                    'description' => 'Set tints for the zoom.',
                    'default' => false
                ],
                'tintscolor' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Tints color(Window only)',
                    'description' => 'Set tints color for the zoom (Optional).'
                ],
                'tintsopacity' => [
                    'type' => 'input.text',
                    'label' => 'Tints Opacity(Window only)',
                    'description' => 'Set tints opacity for the zoom (from o - 1).',
                    'default' => 0.40000000000000002220446049250313080847263336181640625
                ],
                'shape' => [
                    'type' => 'select.selectize',
                    'label' => 'Lens Shape(Lens only)',
                    'description' => 'Customize the lens shape mode.',
                    'default' => 'square',
                    'options' => [
                        'square' => 'square',
                        'round' => 'round'
                    ]
                ],
                'scroll' => [
                    'type' => 'input.checkbox',
                    'label' => 'Mousewheel Zoom',
                    'description' => 'If enabled, you can scroll over the image to zoom in closer (not work with inner zoom).',
                    'default' => true
                ],
                'easing' => [
                    'type' => 'input.checkbox',
                    'label' => 'Smooth movement',
                    'description' => 'Enable smooth movement.',
                    'default' => false
                ],
                'animation' => [
                    'type' => 'input.checkbox',
                    'label' => 'Animation',
                    'description' => 'If enabled, the zoom will have fade in and fade out animation.',
                    'default' => true
                ],
                'css.class' => [
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
