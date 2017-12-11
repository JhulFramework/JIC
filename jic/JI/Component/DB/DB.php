<?php namespace JI\Component\DB;

/* @Author : Manish Dhruw [1D3N717Y12@gmail.com]
+=======================================================================================================================
| @Created : 2017NOV17
+---------------------------------------------------------------------------------------------------------------------*/

class DB extends \JI\Component\_Class
{
	private $_requiredConfig =
	[
		'adapter' =>
		[
			'label' => 'Database Adapter',
			'value' => 'mysql',
		],

		'host' 	=>
		[
			'label' => 'Host',
			'value' => 'localhost',
		],

		'name' 	=>
		[
			'label' => 'Database Name',
		],

		'username'	=>
		[
			'label' => 'Database Username',
		],

		'password'	=>
		[
			'label' => 'Database Password',
		],

		'prefix'	=>
		[
			'label' => 'Database Table Prefix',
		],

	];




	//TODO
	public function testConnection(){}

}
