<?php namespace _m\user\dao\user;

abstract class _DAO extends \Jhul\Components\Database\DAO\_Class
{
	public function tableName() { return 'user'; }

	public function keyName() { return  'identity_key' ; }

	//TODO save and return user preferred language
	public function language() { return $this->read('l10n'); }

	public function managerClass()
	{
		return __NAMESPACE__.'\\Manager' ;
	}

	public static function findByIName( $iname )
	{
		return static::D()->where('iname', $iname)->fetch() ;
	}

	public function avatar()
	{
		return $this->app()->mDataType('avatar')->url( $this->read('avatar') ) ;
	}

	public function name()
	{
		return $this->read('name');
	}

	public function iname()
	{
		return $this->read('iname');
	}

	public function gender()
	{
		return $this->read('gender');
	}

	public function tagline()
	{
		return $this->read('tagline');
	}

	public function url()
	{
		return $this->app()->url().'/@'.$this->iname();
	}

	public static function find( $userKey )
	{
		return  static::D()->where( 'identity_key', $userKey )->fetch();
	}
}
