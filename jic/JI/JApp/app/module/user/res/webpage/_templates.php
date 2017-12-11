<?php return
[
	'verification_mail_text' => __DIR__.'/templates/auth/signup/verification_mail_text',

	'verification_mail_html' => __DIR__.'/templates/auth/signup/verification_mail_html',


	'email_verification' =>
	[
		'template' =>  __DIR__.'/templates/auth/email_verification',
		'style' =>  'form_container|form_button|form_text_field',
	],

	'password_reset_create'	=> __DIR__.'/templates/anon/recover/create',

	'password_reset_form'	=> __DIR__.'/templates/anon/recover/form',


	'profile_a' =>
	[
		'template' => __DIR__.'/templates/anon/user/profile',
		'style' => 'profile'
	],

	'profile' =>
	[
		'template' => __DIR__.'/templates/user/profile',
		'style' => 'profile|vertical_tab|profile_card_a',
	],


	'profile_s' =>
	[
		'file' => __DIR__.'/templates/user/s/profile',
		'view' => 'profile'
	],



	'user_settings_password'		=> __DIR__.'/templates/user/s/settings/password',
	'user_settings_personal'		=> __DIR__.'/templates/user/s/settings/personal',
	'user_settings_tagline'			=> __DIR__.'/templates/user/s/settings/tagline',
	'user_settings_l10n'			=> __DIR__.'/templates/user/s/settings/l10n',


	'avatar_upload'				=> __DIR__.'/templates/user/s/settings/avatar',

];
