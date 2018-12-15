<?php

return [
	'title' => __('Настройки темы', 'bmt'),
 	'logo' => get_template_directory_uri() . '/assets/images/bmt-logo.png',
 	'menus' => [
 		[
 			'title' => __('Основные', 'bmt'),
 			'name' => 'menu_1',
 			'icon' => 'font-awesome:fa-cogs',
 			'controls' => [
 				[
                    'type' => 'section',
                    'title' => __('Настройка футера', 'bmt'),
                    'name' => 'section_1',
                    'description' => __('', 'bmt'),
                    'fields' => [
                        [
                            'type' => 'textbox',
                            'name' => 'company',
                            'label' => __('Компания', 'bmt'),
                            'default' => '',
                        ],
                        [
                            'type' => 'textbox',
                            'name' => 'services',
                            'label' => __('Услуги', 'bmt'),
                            'default' => '',
                        ],
                    ]
                ],
                [
                	'type' => 'section',
                    'title' => __('Общие настройки', 'bmt'),
                    'name' => 'section_2',
                    'description' => __('', 'bmt'),
                    'fields' => [
                        [
                            'type' => 'textbox',
                            'name' => 'adress',
                            'label' => __('Адрес', 'bmt'),
                            'default' => '',
                        ],
                        [
                            'type' => 'textbox',
                            'name' => 'phone',
                            'label' => __('Номер телефона', 'bmt'),
                            'default' => '',
                        ],
                        [
                            'type' => 'textbox',
                            'name' => 'fax',
                            'label' => __('Fax', 'bmt'),
                            'default' => '',
                        ],
                        [
                        	'type' => 'textbox',
                        	'name' => 'email',
                        	'label' => __('Email', 'bmt'),
                        	'default' => ''
                        ],
                        [
                        	'type' => 'slider',
					        'name' => 'news_on_homepage',
					        'label' => __('Кол-во новостей на главной странице', 'bmt'),
					        'min' => '2',
					        'max' => '10',
					        'step' => '1',
					        'default' => '2',
                        ]
                    ]
                ]
 			]
 		]
 	]
];