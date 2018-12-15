<?php

add_action('tgmpa_register', 'bmt_register_required_plugins');

function bmt_register_required_plugins(){
	$plugins = [
		[
			'name' => 'FavPress',
			'slug' => 'favpress',
			'source' => 'https://apps.moewe.io/favpress/stable/favpress.zip',
			'required' => true
		], 
		[
			'name' => 'WPGlobus',
			'slug' => 'wpglobus',
			'source' => 'https://downloads.wordpress.org/plugin/wpglobus.zip'
		],
		[
			'name' => 'Loco Translate',
			'slug' => 'loco_translate',
			'source' => 'https://downloads.wordpress.org/plugin/loco-translate.2.2.0.zip'
		],
		[
			'name' => 'PHP Code Widget',
			'slug' => 'php-code-widget',
			'source' => 'https://downloads.wordpress.org/plugin/php-code-widget.2.3.zip'
		]
	];

	$config = [
        'id'           => 'tmb',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => ''
    ];
	tgmpa($plugins, $config);
}