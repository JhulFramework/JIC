<?php namespace _m\user\db\user;


class Manager extends \Jhul\Components\Database\Manager\_Class
{	
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
