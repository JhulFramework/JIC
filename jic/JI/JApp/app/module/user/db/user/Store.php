<?php namespace _modules\user\models\member;


class Store extends \Jhul\Components\Database\Store\_Class
{

	public function useNULLDataModel()
	{
		return TRUE;
	}

	public function items()
	{
		return
		[
			'uvo' =>
			[
				'class'	=> '\\_modules\\user\\nodes\\visit\\uvo\\Host',
				'select'	=> 'iname:name:gender:tagline:avatar',
			],

			'anon'	=>
			[
				'class' 	=> '\\_modules\\user\\nodes\\anon\\access\\user\\M',
				'select'	=> 'iname:name:gender:tagline:avatar',
			],

			'write' =>
			[
				'class'	=> '\\_modules\\user\\models\\member\\s\\Write',
				'select'	=> '*',
			],

			'uvs' =>
			[
				'class'	=> '\\_modules\\user\\nodes\\visit\\uvs\\Host',
				'select'	=> '*',
			],

			'visitor' =>
			[
				'class'	=> __NAMESPACE__.'\\user\\AsVisitor',
				'select'	=> '*',
			],


			'lvm' =>
			[
				'class'	=> __NAMESPACE__.'\\lvm\\LVM',
				'select'	=> 'name:gender:iname',
			],


			'login' =>
			[
				'class' 	=> '\\_modules\\user\\nodes\\member\\auth\\login\\M',
				'select'	=> 'avatar:email:gender:identity_key:iname:l10n:name:password:tagline',
			],

			'exists' =>
			[
				'class' 	=> __NAMESPACE__.'\\Exists',
				'select'	=> 'iname:email:identity_key',
			],

			'null'	=>  __NAMESPACE__.'\\_NULL',
		];
	}

	public function beforeInsert( $entity )
	{
		$entity->write( 'iname', $this->getApp()->mDataType('iname')->generateNew() );
		$entity->write( 'l10n', $this->getApp()->lipi()->currentLanguage()->code() );
		return $entity;
	}

	public function matchPassword( $raw, $hashed )
	{
		return $this->getApp()->mDataType('password')->verifyHash( $raw, $hashed );
	}

	public function valueDeflaters( )
	{
		return
		[
			'password' =>  'encodePassword',
		];
	}

	public function encodePassword( $password )
	{
		return $this->getApp()->mDataType('password')->hash( $password );
	}

}
