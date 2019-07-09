<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/config/44/layout.yaml',
    'modified' => 1557077214,
    'data' => [
        'version' => 2,
        'preset' => [
            'image' => 'gantry-admin://images/layouts/default.png',
            'name' => 'default',
            'timestamp' => 1481092873
        ],
        'layout' => [
            'navigation' => [
                
            ],
            'header' => [
                
            ],
            'intro' => [
                
            ],
            'features' => [
                
            ],
            'utility' => [
                
            ],
            '/above/' => [
                0 => [
                    0 => 'custom-9752'
                ]
            ],
            '/testimonials/' => [
                
            ],
            '/expanded/' => [
                0 => [
                    0 => 'system-content-1587'
                ]
            ],
            '/container-main/' => [
                0 => [
                    0 => [
                        'aside 20' => [
                            
                        ]
                    ],
                    1 => [
                        'mainbar 60' => [
                            
                        ]
                    ],
                    2 => [
                        'sidebar 20' => [
                            
                        ]
                    ]
                ]
            ],
            'footer' => [
                
            ],
            'offcanvas' => [
                
            ]
        ],
        'structure' => [
            'navigation' => [
                'type' => 'section',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ]
            ],
            'header' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ]
            ],
            'intro' => [
                'type' => 'section',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ]
            ],
            'features' => [
                'type' => 'section',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ]
            ],
            'utility' => [
                'type' => 'section',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ]
            ],
            'above' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '',
                    'class' => '',
                    'variations' => 'nomarginall nopaddingall'
                ]
            ],
            'testimonials' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '',
                    'class' => '',
                    'variations' => ''
                ]
            ],
            'expanded' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '1',
                    'class' => '',
                    'variations' => ''
                ]
            ],
            'aside' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ],
                'block' => [
                    'fixed' => '1'
                ]
            ],
            'mainbar' => [
                'type' => 'section',
                'subtype' => 'main',
                'attributes' => [
                    'class' => '',
                    'variations' => ''
                ]
            ],
            'sidebar' => [
                'type' => 'section',
                'subtype' => 'aside',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ],
                'block' => [
                    'fixed' => '1'
                ]
            ],
            'container-main' => [
                'attributes' => [
                    'boxed' => ''
                ]
            ],
            'footer' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ]
            ],
            'offcanvas' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block',
                        2 => 'children'
                    ]
                ]
            ]
        ],
        'content' => [
            'custom-9752' => [
                'title' => 'Custom HTML',
                'attributes' => [
                    'html' => '<div id="identify"></div>'
                ],
                'block' => [
                    'extra' => [
                        0 => [
                            'style' => 'background:radial-gradient(#818190ff, #504f63ff); height:320px'
                        ]
                    ]
                ]
            ],
            'system-content-1587' => [
                'block' => [
                    'id' => 'news',
                    'class' => 'article',
                    'variations' => 'spaced',
                    'extra' => [
                        0 => [
                            'style' => 'background: white;     border: 1px solid;     padding: 5%;     margin: -18% 0 0;position: relative;'
                        ]
                    ]
                ]
            ]
        ]
    ]
];
