<?php namespace _m\user\dao\user;


class Manager extends \Jhul\Components\Database\Manager\_Class
{

	public function __construct()
	{
		foreach ($this->daoClasses() as $context => $param)
		{
			$this->register( $context, $param );
		}
	}

	private function daoClasses()
	{
		return
		[
			'visit_user_anon' =>
			[
				'class' 	=> '\\_m\\user\\context\\anon\\visit_user\\Host',
				'select'	=> ['iname', 'name', 'tagline', 'gender', 'avatar'],
			],

			'siu_settings' =>
			[
				'class' 	=> '\\_m\\user\\context\\siu\\settings\\dao\\User',
				'select'	=> '*',
			],
		] ;
	}

	public function beforeInsert( $entity )
	{
		$entity->write( 'iname', $this->app()->mDataType('iname')->generateNew() );
		$entity->write( 'l10n', $this->app()->language()->code() );
		return $entity;
	}

	public function matchPassword( $raw, $hashed )
	{
		return $this->app()->mDataType('password')->verifyHash( $raw, $hashed );
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
		return $this->app()->mDataType('password')->hash( $password );
	}

}
