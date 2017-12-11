<?php return
[
	'name' =>
	[
		'label' 	=> 'Database Name',
		'view_type' => 'editText',
		'data_type' => 'string',
	],

	'host' =>
	[
		'label' 	=> 'Host',
		'view_type' => 'editText',
		'data_type' => 'string',
		'default'	=> 'localhost'
	],

	'username' =>
	[
		'label' 	=> 'Username',
		'view_type' => 'editText',
		'data_type' => 'string',
	],

	'password' =>
	[
		'label' 	=> 'Password',
		'view_type' => 'editText',
		'data_type' => 'string',
	],

	'prefix' =>
	[
		'label' 	=> 'Databse Table Prefix',
		'view_type' => 'editText',
		'data_type' => 'string?required=0',
	],

];
