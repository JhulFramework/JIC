<?php namespace _modules\user\nodes\anon\signup ;

class Form extends \Jhul\Components\Form\EditDBEntity
{

	function stringKeys()
	{
		return [ 'Name', 'Email', 'Password', 'Register', 'Login', 'New Account' ];
	}

	public function entityClass()
	{
		return '\\_modules\\user\\models\\anon\\User';
	}

	public function name()
	{
		return 'signup';
	}


	//used to vliadte user submitted data
	public function fields()
	{
		return
		[
			'name'	=> 'name',

			'password'	=> 'password',

			'email'	=> 'signup_email',
		];
	}


	function save()
	{
		if( $this->validate() )
		{
			$this->entity()->write('name', $this->name->value() );
			$this->entity()->write('email', $this->email->value() );
			$this->entity()->write('password', $this->password->value() );
			$this->entity()->write('verification_code', $this->getApp()->mDataType('signup_email')->generateVerificationCode() );
			$this->entity()->commit();
			return TRUE;
		}
	}

}
