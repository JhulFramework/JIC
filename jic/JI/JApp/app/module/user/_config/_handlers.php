<?php  return
[

	'index'				=> '\\_m\\user\\context\\Handler',

	'login'				=> '\\_m\\user\\context\\anon\\login\\Handler',

	'auth_status'			=> '\\_modules\\user\\nodes\\member\\auth\\status\\Handler',

	//'logout'				=> '\\_modules\\user\\nodes\\member\\auth\\logout\\Handler',
	'logout'				=> '\\_m\\user\\context\\logout\\Handler',

	'recovery'				=> '\\_modules\\user\\nodes\\recovery\\Handler',

	'verify'				=> '\\_modules\\user\\nodes\\anon\\signup\\verification\\Handler',

	//'visit'				=> '\\_modules\\user\\nodes\\visit\\Handler',

	'create'				=> '\\_m\\user\\context\\siu_\\create_\\Handler',

	'siu_read'				=> '\\_m\\user\\context\\siu_\\read_\\Handler',

	'siu'					=> '\\_m\\user\\context\\siu_\\Handler',

	'anon'				=> '\\_m\\user\\context\\anon\\Handler',
];
