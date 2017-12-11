<?php return
[
	'base_url' =>
	[
		'label' 	=> 'Base URL',
		'view_type' => 'editText',
		'data_type' => 'string',
		'default'	=>  trim( $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], '/'),
	],

	'encryption_key' =>
	[
		'label' 	=> 'Encryption Key',
		'view_type' => 'editText',
		'data_type' => 'string',
	],
];
