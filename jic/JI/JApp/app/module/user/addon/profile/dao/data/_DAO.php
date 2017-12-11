<?php namespace _m\user\addon\profile\dao\data;

abstract class _DAO extends \Jhul\Components\Database\DAO\_Class
{
	public function tableName()
	{
		return 'profile_data' ;
	}

	public function keyName()
	{
		return 'userKey' ;
	}

	public static function find($userKey)
	{
		return static::D()->where( 'userKey', $userKey )->fetch() ;
	}
}
