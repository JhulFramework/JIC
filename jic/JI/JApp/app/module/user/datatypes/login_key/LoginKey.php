<?php namespace _modules\user\datatypes\login_key;

class LoginKey
{
	use \Jhul\Core\_AccessKey;

	public function make( $value )
	{
		if( strpos( $value, '@' ) )
		{
			return $this->getApp()->mDataType('login_email')->make($value);
		}

		return $this->getApp()->mDataType('iname')->make($value);
	}
}
