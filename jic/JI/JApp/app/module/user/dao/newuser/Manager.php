<?php namespace _m\user\dao\newuser;

class Manager extends \Jhul\Components\Database\Manager\_Class
{

	public function __construct()
	{
		foreach ($this->daoClasses() as $context => $param)
		{
			$this->register( $context, $param );
		}
	}

	public function daoClasses()
	{
		return
		[
			'signup' =>
			[
				'class' 	=> '\\_m\\user\\context\\anon\\signup\\dao\\User',
				'select'	=> '*',
			],
		];
	}


	public function beforeInsert( $entity )
	{
		$dAccounts = $entity::D()->byEmail( $entity->email() )->fetchAll();

		foreach ( $dAccounts as $da )
		{
			$da->delete();
		}

		$entity->write( 'created', time() );

		return $entity;
	}

	public function hashPassword( $password )
	{
		return $this->getApp()->mDataType('password')->hash( $password ) ;
	}

	public function valueDeflaters()
	{
		return
		[
			'password' => 'hashPassword',
		];
	}

	public function useNullDataModel()
	{
		return TRUE;
	}
}
