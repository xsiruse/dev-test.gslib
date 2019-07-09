<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/config/35/layout.yaml',
    'modified' => 1555874079,
    'data' => [
        'version' => 2,
        'preset' => [
            'image' => 'gantry-admin://images/layouts/default.png',
            'name' => 'default',
            'timestamp' => 1505850393
        ],
        'layout' => [
            'navigation' => [
                
            ],
            '/header/' => [
                
            ],
            'intro' => [
                
            ],
            '/features/' => [
                0 => [
                    0 => 'owlcarousel-6883'
                ]
            ],
            '/utility/' => [
                0 => [
                    0 => 'content-pro-joomla-6821'
                ]
            ],
            '/above/' => [
                
            ],
            'testimonials' => [
                
            ],
            'expanded' => [
                
            ],
            '/container-main/' => [
                0 => [
                    0 => [
                        'aside 25' => [
                            0 => [
                                0 => 'position-position-6169'
                            ],
                            1 => [
                                0 => 'position-module-7069'
                            ]
                        ]
                    ],
                    1 => [
                        'mainbar 50' => [
                            0 => [
                                0 => 'top-news-joomla-4393'
                            ],
                            1 => [
                                0 => 'contentarray-5898'
                            ]
                        ]
                    ],
                    2 => [
                        'sidebar 25' => [
                            0 => [
                                0 => 'position-position-8085'
                            ]
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
                        1 => 'children'
                    ]
                ]
            ],
            'header' => [
                'attributes' => [
                    'boxed' => '',
                    'class' => ''
                ]
            ],
            'intro' => [
                'type' => 'section',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'children'
                    ]
                ]
            ],
            'features' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '2',
                    'class' => ''
                ]
            ],
            'utility' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '2',
                    'class' => ''
                ]
            ],
            'above' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '',
                    'class' => ''
                ]
            ],
            'testimonials' => [
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
            'expanded' => [
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
            'aside' => [
                'attributes' => [
                    'class' => ''
                ],
                'block' => [
                    'fixed' => '1'
                ]
            ],
            'mainbar' => [
                'type' => 'section',
                'subtype' => 'main',
                'attributes' => [
                    'class' => ''
                ]
            ],
            'sidebar' => [
                'type' => 'section',
                'subtype' => 'aside',
                'attributes' => [
                    'class' => ''
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
                        1 => 'children'
                    ]
                ]
            ],
            'offcanvas' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'children'
                    ]
                ]
            ]
        ],
        'content' => [
            'owlcarousel-6883' => [
                'title' => 'Owl Carousel',
                'attributes' => [
                    'nav' => 'enable',
                    'dots' => 'enable',
                    'autoplay' => 'enable',
                    'autoplaySpeed' => '15000',
                    'imageOverlay' => 'disable',
                    'items' => [
                        0 => [
                            'class' => '',
                            'image' => 'gantry-media://banners/96a71fa8dab19e4559509f4e2b3045fc.jpg',
                            'title' => '',
                            'desc' => '',
                            'link' => '',
                            'linktext' => '',
                            'buttonclass' => 'button-outline',
                            'disable' => '0',
                            'name' => '1'
                        ],
                        1 => [
                            'class' => '',
                            'image' => 'gantry-media://banners/dc77d948733065ea44ddb3e106e00936.jpg',
                            'title' => '',
                            'desc' => '',
                            'link' => '',
                            'linktext' => '',
                            'buttonclass' => 'button-outline',
                            'disable' => '0',
                            'name' => '2'
                        ],
                        2 => [
                            'class' => '',
                            'image' => 'gantry-media://banners/d922ef8603d1fd78eab16e29c30e7bfa.jpg',
                            'title' => '',
                            'desc' => '',
                            'link' => '',
                            'linktext' => '',
                            'buttonclass' => 'button-outline',
                            'disable' => '0',
                            'name' => '3'
                        ]
                    ]
                ]
            ],
            'content-pro-joomla-6821' => [
                'title' => 'Content PRO (Joomla)',
                'attributes' => [
                    'mainheading' => 'HOT NEWS',
                    'style' => 'style2',
                    'behaviour' => 'slider',
                    'columns' => '3',
                    'gutter' => 'disabled',
                    'autoplay' => 'disable',
                    'navigation' => 'both',
                    'lightbox' => 'enable',
                    'pullup' => '0',
                    'article' => [
                        'filter' => [
                            'categories' => '13',
                            'articles' => '',
                            'featured' => 'include'
                        ],
                        'limit' => [
                            'total' => '0',
                            'start' => ''
                        ],
                        'sort' => [
                            'orderby' => 'ordering',
                            'ordering' => 'ASC'
                        ],
                        'display' => [
                            'image' => [
                                'enabled' => 'intro'
                            ],
                            'title' => [
                                'enabled' => 'show'
                            ],
                            'date' => [
                                'enabled' => 'published'
                            ],
                            'hits' => [
                                'enabled' => 'show'
                            ],
                            'text' => [
                                'type' => ''
                            ],
                            'read_more' => [
                                'enabled' => 'show',
                                'label' => ''
                            ]
                        ]
                    ],
                    'height' => '300',
                    'articledetails' => 'hide'
                ]
            ],
            'position-position-6169' => [
                'title' => 'Aside',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block'
                    ],
                    'particle' => 'position-position-4734'
                ]
            ],
            'position-module-7069' => [
                'title' => 'Module Instance',
                'attributes' => [
                    'module_id' => '192',
                    'key' => 'module-instance'
                ]
            ],
            'top-news-joomla-4393' => [
                'title' => 'Top News (Joomla)',
                'attributes' => [
                    'article' => [
                        'filter' => [
                            'categories' => '13',
                            'articles' => '',
                            'featured' => 'include'
                        ],
                        'limit' => [
                            'start' => '0'
                        ],
                        'sort' => [
                            'orderby' => 'publish_up',
                            'ordering' => 'ASC'
                        ]
                    ]
                ]
            ],
            'contentarray-5898' => [
                'title' => 'Joomla Articles',
                'attributes' => [
                    'article' => [
                        'filter' => [
                            'categories' => '13',
                            'articles' => '',
                            'featured' => 'include'
                        ],
                        'limit' => [
                            'total' => '2',
                            'columns' => '1',
                            'start' => '0'
                        ],
                        'display' => [
                            'pagination_buttons' => ''
                        ],
                        'sort' => [
                            'orderby' => 'publish_up',
                            'ordering' => 'ASC'
                        ]
                    ]
                ]
            ],
            'position-position-8085' => [
                'title' => 'Sidebar',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'block'
                    ],
                    'particle' => 'position-position-3949'
                ]
            ]
        ]
    ]
];
