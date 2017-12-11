<?php namespace _m\user\addon\profile;

class Addon extends \Jhul\Core\Application\Addon\_Class
{
	//returns profile data model
	public function get( $userKey )
	{
		$profile = context\read_\Profile::find($userKey);

		if( NULL == $profile )
		{
			$this->create( $userKey );
		}

		return context\read_\Profile::find($userKey);
	}

	//returns profile data model
	public function create( $userKey, $params = [] )
	{
		$profile = context\read_\Profile::find($userKey);

		if( !empty($old) )
		{
			throw new \Exception( 'Profile For User "'.$userKey.'" Already Exits' , 1);
		}

		context\write_\Profile::create( $userKey, $params );
	}
}
