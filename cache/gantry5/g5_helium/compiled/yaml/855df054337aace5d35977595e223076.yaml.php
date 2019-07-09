<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/progress-bar.yaml',
    'modified' => 1555874229,
    'data' => [
        'name' => 'Progress Bar',
        'description' => 'Progress Bar',
        'type' => 'particle',
        'icon' => 'fa-bars',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable to the particles.',
                    'default' => true
                ],
                'style' => [
                    'type' => 'select.select',
                    'label' => 'Style',
                    'description' => 'Select style.',
                    'default' => 1,
                    'options' => [
                        1 => 'Style 1',
                        2 => 'Style 2',
                        3 => 'Style 3'
                    ]
                ],
                'items' => [
                    'type' => 'collection.list',
                    'array' => true,
                    'label' => 'Items',
                    'value' => 'title',
                    'ajax' => true,
                    'fields' => [
                        '.pb.text' => [
                            'type' => 'input.text',
                            'label' => 'Text',
                            'description' => 'Enter text of progress bar.'
                        ],
                        '.pb.percent' => [
                            'type' => 'input.number',
                            'max' => 100,
                            'min' => 0,
                            'label' => 'Percent',
                            'description' => 'Enter percentage number of progress bar.'
                        ],
                        '.pb.color' => [
                            'type' => 'select.select',
                            'label' => 'Style',
                            'description' => 'Customize style of progress bar.',
                            'default' => NULL,
                            'options' => [
                                '' => 'Default',
                                'uk-progress-success' => 'Progress Success',
                                'uk-progress-warning' => 'Progress Warning',
                                'uk-progress-danger' => 'Progress Danger'
                            ]
                        ],
                        '.pb.striped' => [
                            'type' => 'select.select',
                            'label' => 'Striped',
                            'default' => 'yes',
                            'description' => 'Striped progress bar.',
                            'options' => [
                                '' => 'No',
                                'uk-progress-striped' => 'Yes'
                            ]
                        ],
                        '.pb.duration' => [
                            'type' => 'input.number',
                            'label' => 'Enter animation duration (second).',
                            'default' => 2
                        ]
                    ]
                ],
                'css.class' => [
                    'type' => 'input.selectize',
                    'label' => 'CSS Classes',
                    'description' => 'CSS class name for the particle'
                ],
                'copyright' => [
                    'type' => 'separator.note',
                    'class' => 'alert alert-info',
                    'content' => 'Developed and maintained by <a href="https://www.joomlead.com/" target="_blank">JoomLead.com</a><br><strong>Version: 1.0.1</strong>'
                ]
            ]
        ]
    ]
];
