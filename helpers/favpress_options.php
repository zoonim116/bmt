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
                    'title' => __('', 'bmt'),
                    'name' => 'section_1',
                    'description' => __('', 'bmt'),
                    'fields' => [
                        [
                            'type' => 'textbox',
                            'name' => 'address',
                            'label' => __('Адрес', 'audent'),
                            'default' => 'г. Днепр, ул. Князя Владимира Великого, 15а',
                        ],
                        [
                            'type' => 'textbox',
                            'name' => 'phone_1',
                            'label' => __('Номер телефона (Киевстар)', 'audent'),
                            'default' => '(067) 567-89-00',
                        ],
                        [
                            'type' => 'textbox',
                            'name' => 'phone_2',
                            'label' => __('Номер телефона (Lifecell) ', 'audent'),
                            'default' => '(067) 567-89-00',
                        ],
                        [
                            'type' => 'textbox',
                            'name' => 'phone_3',
                            'label' => __('Номер телефона (Vodafone) ', 'audent'),
                            'default' => '(095) 123-45-67',
                        ],
                        [
                            'type' => 'textbox',
                            'name' => 'phone_4',
                            'label' => __('Номер телефона (Городской номер) ', 'audent'),
                            'default' => '(056) 123-45-67',
                        ]
                    ]
                ],
 			]
 		]
 	]
];