<?php return
[


	'key'		=>
	[
		'definition' => 'pdn',

		'type' => 'text',

		'id' => 'page_key',

		'label' => 'Key',
	],


	'password'	=>
	[
		'definition' => 'string',

		'type' => 'password',

		'id' => 'password',

		'label' => 'गुप्तशब्द',
	],


	'iname'		=>
	[
		'definition' => 'iname',

		'type' => 'text',

		'id' => 'iname',

		'label' => 'IName',
	],


	'login_key'	=>
	[
		'definition' => 'string',

		'type' => 'text',

		'id' => 'login_key',

		'label' => 'ईमेल',
	],

	'name'		=>
	[
		'definition' => 'string',

		'type' => 'text',

		'id' => 'name',

		'label' => 'Name',
	],

	'gender'		=>
	[
		'definition' => 'string?required=0',

		'type' => 'text',

		'id' => 'gender',

		'label' => 'Gender',
	],

	'avatar'		=>
	[
		'definition' => 'avatar',

		'type' => 'text',

		'id' => 'avatar',

		'label' => 'Avatar',
	],

	'l10n'		=>
	[
		'definition' => 'string?required=0',

		'type' => 'text',

		'id' => 'language',

		'label' => 'Language',
	],


	'tagline'		=>
	[
		'definition' => 'string?required=0',

		'type' => 'text',

		'id' => 'tagline',

		'label' => 'Tagline',
	],

	'password_old'		=>
	[
		'definition' => 'string',

		'type' => 'password',

		'id' => 'old password',

		'label' => 'Old Password',
	],

	'password_new'		=>
	[
		'definition' => 'string',

		'type' => 'password',

		'id' => 'new password',

		'label' => 'नया गुप्तशब्द',
	],

	'password_new_confirm'		=>
	[
		'definition' => 'string',

		'type' => 'password',

		'id' => 'confirm new password',

		'label' => 'नया गुप्तशब्द पुनः',
	],

	'signup_email'		=>
	[
		'definition' => 'signup_email',

		'description'	=> 'email_field_description',

		'type' => 'text',

		'id' => 'email',

		'label' => 'Email',
	],

	'login_email'		=>
	[
		'definition' 	=> 'login_email',

		'description'	=> 'email_field_description',

		'type' => 'text',

		'id' => 'email',

		'label' => 'Email',
	],
];
