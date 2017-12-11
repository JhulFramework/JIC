<?php return
[
	'key' =>
	[
		'definition' => 'pdn',

		'type' => 'text',

		'id'	=> 'item_key',

		'label'	=> 'Item Key',
	],

	'name' =>
	[
		'definition' => 'namekey',

		'type' => 'text',

		'id'	=> 'item_name',

		'label'	=> 'Name',
	],


	'description'	=>
	[
		'definition' => 'string?required=0',

		'type' 	=> 'text_area',

		'id'		=> 'item_description',

		'label'	=> 'Description',
	],

	'style' =>
	[
		'definition' => 'string?required=0',

		'type' => 'text_area',

		'id'	=> 'css_code',

		'label' => 'CSS Code',
	],

	'script' =>
	[
		'definition' => 'string?required=0:l=1-12000',

		'type' => 'text_area',

		'id'	=> 'Javascript',

		'label'	=> 'Javascript',
	],

];
