<?php namespace _m\user\addon\profile\dao\profile;

trait _WriteMode
{

	public static function find( $userKey, $params = [] )
	{
		$profile = parent::find($userKey);

		if( !empty($profile) )
		{
			return $profile ;
		}

		return static::create( $userKey, $params );
	}

	public static function create( $userKey, $params = [] )
	{
		static::createRecord( $userKey, static::getDAOClass('Data') );
		static::createRecord( $userKey, static::getDAOClass('Style') );
		static::createRecord( $userKey, static::getDAOClass('SocialLink') );

		return parent::find($userKey);
	}

	private static function createRecord( $userKey, $class )
	{
		$obj = new $class;
		$obj->write('userKey', $userKey)->commit();
	}
}
