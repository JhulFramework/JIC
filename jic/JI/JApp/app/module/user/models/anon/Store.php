<?php namespace _modules\user\models\anon;

class Store extends \Jhul\Components\Database\Store\_Class
{
	public function name(){ return 'user_unverified' ; }

	public function items()
	{
		return
		[
			'signup' =>
			[
				'class' 	=>  __NAMESPACE__.'\\User',
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
