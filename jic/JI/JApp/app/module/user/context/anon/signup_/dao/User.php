<?php namespace _m\user\context\anon\signup\dao;

class User extends \_m\user\dao\newuser\_DAO
{
	use \Jhul\Components\Database\DAO\_WriteAccessKey;

	public function context()
	{
		return 'signup' ;
	}
}
