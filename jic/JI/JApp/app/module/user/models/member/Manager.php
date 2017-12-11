<?php namespace _modules\user\models\member;

/* @Author : Manish Dhruw [1d3n717y12@gmail.com]
+=====================================================================================================================
| @Created : 2016-September-05
| Universal user finder
+---------------------------------------------------------------------------------------------------------------------*/


class Manager
{

	use \Jhul\Core\_AccessKey;

	public static function I() { return new static(); }

	//host relative to current user
	public function findHost( $iname )
	{
		if( $this->getApp()->user()->isAnon() ) { return $this->dispenser('avu')->byIName($iname)->fetch(); }

		if( !$this->getApp()->user()->isAnon()  )
		{
			if( $this->getApp()->user()->iname() == $iname ) return $this->dispenser('uvs')->byIName( $this->getApp()->user()->iname() )->fetch() ;

		  	return $this->dispenser('uvu')->byIName($iname)->fetch() ;
		}

		return $this->dispenser('null')->fetch();
	}

	public function findByKey( $user_key, $context )
	{
		return $this->dispenser($context)->byKey( $user_key )->fetch() ;
	}

	public function findByIname( $iname, $context )
	{
		return $this->dispenser( $context )->byIName( $iname )->fetch() ;
	}

	public function findByEmail( $email, $context )
	{
		return $this->dispenser( $context )->byEmail( $email )->fetch() ;
	}

	public function dispenser( $context )
	{
		return Store::D($context);
	}

	public function findByKeys( $keys, $context )
	{
		return $this->dispenser( $context )->whereIN( 'identity_key', $keys )->fetchAll();
	}

}
