<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/top-news-joomla.yaml',
    'modified' => 1555874232,
    'data' => [
        'name' => 'Top News (Joomla)',
        'description' => 'Display Joomla articles in a fancy way.',
        'type' => 'particle',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable Top News (Joomla) particles.',
                    'default' => true
                ],
                '_tabs' => [
                    'type' => 'container.tabs',
                    'fields' => [
                        '_tab_main' => [
                            'label' => 'Main Settings',
                            'fields' => [
                                'mainheading' => [
                                    'type' => 'input.text',
                                    'label' => 'Title',
                                    'description' => 'Type in the title.',
                                    'placeholder' => 'Enter Title',
                                    'default' => ''
                                ],
                                'introtext' => [
                                    'type' => 'textarea.textarea',
                                    'label' => 'Intro Text',
                                    'description' => 'Type in the intro text.',
                                    'placeholder' => 'Enter Intro Text',
                                    'default' => ''
                                ],
                                'height' => [
                                    'type' => 'input.text',
                                    'label' => 'Height',
                                    'description' => 'Set the Top News height in pixels (do NOT type in \'px\', enter just the digits). Default is \'450\'.',
                                    'default' => 450,
                                    'pattern' => '\\d{1,4}'
                                ],
                                'style' => [
                                    'type' => 'select.select',
                                    'label' => 'Style',
                                    'description' => 'Select the style which defines the particle layout on the frontend.',
                                    'placeholder' => 'Select...',
                                    'default' => 'style1',
                                    'options' => [
                                        'style1' => 'Style 1 (5 Articles)',
                                        'style2' => 'Style 2 (3 Articles)',
                                        'style3' => 'Style 3 (4 Articles)'
                                    ]
                                ],
                                'layout' => [
                                    'type' => 'select.select',
                                    'label' => 'Layout',
                                    'description' => 'Select the layout to be used. This setting defines the width of the Main/Secondary articles.',
                                    'placeholder' => 'Select...',
                                    'default' => 'layout1',
                                    'options' => [
                                        'layout1' => '50/50',
                                        'layout2' => '75/25',
                                        'layout3' => '66/33',
                                        'layout4' => '25/75',
                                        'layout5' => '33/66'
                                    ]
                                ],
                                'gutter' => [
                                    'type' => 'select.select',
                                    'label' => 'Gutter',
                                    'description' => 'Enable or disable the Top News gutter (to have space between the items or not).',
                                    'placeholder' => 'Select...',
                                    'default' => 'disabled',
                                    'options' => [
                                        'enabled' => 'Enabled',
                                        'disabled' => 'Disabled'
                                    ]
                                ],
                                'css.class' => [
                                    'type' => 'input.selectize',
                                    'label' => 'CSS Classes',
                                    'description' => 'CSS class name for the particle.',
                                    'default' => NULL
                                ],
                                'extra' => [
                                    'type' => 'collection.keyvalue',
                                    'label' => 'Tag Attributes',
                                    'description' => 'Extra Tag attributes.',
                                    'key_placeholder' => 'Key (data-*, style, ...)',
                                    'value_placeholder' => 'Value',
                                    'exclude' => [
                                        0 => 'id',
                                        1 => 'class'
                                    ]
                                ]
                            ]
                        ],
                        '_tab_source' => [
                            'label' => 'Data Source',
                            'fields' => [
                                'article.filter.categories' => [
                                    'type' => 'joomla.categories',
                                    'label' => 'Categories',
                                    'description' => 'Select the categories the articles should be taken from.',
                                    'overridable' => false
                                ],
                                'article.filter.articles' => [
                                    'type' => 'input.text',
                                    'label' => 'Articles',
                                    'description' => 'Enter the Joomla articles that should be shown. It should be a list of article IDs separated with a comma (i.e. 1,2,3,4,5).',
                                    'overridable' => false
                                ],
                                'article.filter.featured' => [
                                    'type' => 'select.select',
                                    'label' => 'Featured Articles',
                                    'description' => 'Select how Featured articles should be filtered.',
                                    'default' => '',
                                    'options' => [
                                        'include' => 'Include Featured',
                                        'exclude' => 'Exclude Featured',
                                        'only' => 'Only Featured'
                                    ],
                                    'overridable' => false
                                ],
                                'article.limit.start' => [
                                    'type' => 'input.text',
                                    'label' => 'Start From',
                                    'description' => 'Enter offset specifying the first article to return. The default is \'0\' (the first article).',
                                    'default' => 0,
                                    'pattern' => '\\d{1,2}',
                                    'overridable' => false
                                ],
                                'article.sort.orderby' => [
                                    'type' => 'select.select',
                                    'label' => 'Order By',
                                    'description' => 'Select how the articles should be ordered by.',
                                    'default' => 'publish_up',
                                    'options' => [
                                        'publish_up' => 'Published Date',
                                        'created' => 'Created Date',
                                        'modified' => 'Last Modified Date',
                                        'title' => 'Title',
                                        'ordering' => 'Ordering',
                                        'hits' => 'Hits',
                                        'id' => 'ID',
                                        'alias' => 'Alias'
                                    ],
                                    'overridable' => false
                                ],
                                'article.sort.ordering' => [
                                    'type' => 'select.select',
                                    'label' => 'Ordering Direction',
                                    'description' => 'Select the direction the articles should be ordered by.',
                                    'default' => 'ASC',
                                    'options' => [
                                        'ASC' => 'Ascending',
                                        'DESC' => 'Descending'
                                    ],
                                    'overridable' => false
                                ]
                            ]
                        ],
                        '_tab_layout' => [
                            'label' => 'Article Layout',
                            'fields' => [
                                'article.display.image.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Image',
                                    'description' => 'Select what image of the article should be shown.',
                                    'default' => 'intro',
                                    'options' => [
                                        'intro' => 'Intro',
                                        'full' => 'Full'
                                    ]
                                ],
                                'article.display.title.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Title',
                                    'description' => 'Select if the article title should be shown.',
                                    'default' => 'show',
                                    'options' => [
                                        'show' => 'Show',
                                        '' => 'Hide'
                                    ]
                                ],
                                'article.display.title.limit' => [
                                    'type' => 'input.text',
                                    'label' => 'Title Limit',
                                    'description' => 'Enter the maximum number of characters the article title should be limited to.',
                                    'pattern' => '\\d+(\\.\\d+){0,1}'
                                ],
                                'article.display.date.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Date',
                                    'description' => 'Select if the article date should be shown.',
                                    'default' => 'published',
                                    'options' => [
                                        'created' => 'Show Created Date',
                                        'published' => 'Show Published Date',
                                        'modified' => 'Show Modified Date',
                                        '' => 'Hide'
                                    ]
                                ],
                                'article.display.date.format' => [
                                    'type' => 'select.date',
                                    'label' => 'Date Format',
                                    'description' => 'Select preferred date format.',
                                    'default' => 'l, F d, Y',
                                    'selectize' => [
                                        'allowEmptyOption' => true
                                    ],
                                    'options' => [
                                        'l, F d, Y' => 'Date1',
                                        'l, d F' => 'Date2',
                                        'D, d F' => 'Date3',
                                        'F d' => 'Date4',
                                        'd F' => 'Date5',
                                        'd M' => 'Date6',
                                        'D, M d, Y' => 'Date7',
                                        'D, M d, y' => 'Date8',
                                        'l' => 'Date9',
                                        'l j F Y' => 'Date10',
                                        'j F Y' => 'Date11'
                                    ]
                                ],
                                'article.display.category.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Category',
                                    'description' => 'Select if and how the article category should be shown.',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show with Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'article.display.author.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Author',
                                    'description' => 'Select if the article author should be shown.',
                                    'default' => '',
                                    'options' => [
                                        'show' => 'Show (Author)',
                                        'showalias' => 'Show (Alias)',
                                        '' => 'Hide'
                                    ]
                                ],
                                'article.display.hits.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Hits',
                                    'description' => 'Select if the article hits should be shown.',
                                    'default' => '',
                                    'options' => [
                                        'show' => 'Show',
                                        '' => 'Hide'
                                    ]
                                ],
                                'article.display.text.type' => [
                                    'type' => 'select.select',
                                    'label' => 'Article Text',
                                    'description' => 'Select if and how the article text should be shown (Main Article ONLY - there is not enough space to show the text in the Secondary Articles).',
                                    'default' => 'intro',
                                    'options' => [
                                        'intro' => 'Introduction',
                                        'full' => 'Full Article',
                                        '' => 'Hide'
                                    ]
                                ],
                                'article.display.text.limit' => [
                                    'type' => 'input.text',
                                    'label' => 'Text Limit',
                                    'description' => 'Type in the number of characters the article text should be limited to.',
                                    'default' => '',
                                    'pattern' => '\\d+'
                                ],
                                'article.display.text.formatting' => [
                                    'type' => 'select.select',
                                    'label' => 'Text Formatting',
                                    'description' => 'Select the formatting you want to use to display the article text.',
                                    'default' => 'text',
                                    'options' => [
                                        'text' => 'Plain Text',
                                        'html' => 'HTML'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
