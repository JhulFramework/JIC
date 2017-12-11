<?php namespace _modules\user\nodes\anon\signup\models;

class Manager
{
	public function find( $email )
	{
		return User::I()->store()->byEmail($email)->fetch();
	}
}
