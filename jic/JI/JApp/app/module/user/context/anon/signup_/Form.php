<?php namespace _m\user\context\anon\signup;

class Form extends \Jhul\Components\Form\EditDBEntity
{

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
			'name',

			'signup_email',

			'password',
		];
	}


	function save()
	{
		if( $this->validate() )
		{
			$this->entity()->write('name', $this->name->value() );
			$this->entity()->write('email', $this->signup_email->value() );
			$this->entity()->write('password', $this->password->value() );
			$this->entity()->write('verification_code', $this->getApp()->mDataType('signup_email')->generateVerificationCode() );
			$this->entity()->commit();
			return TRUE;
		}
	}

	public function showError( $key )
	{
		if( $this->hasError( $key ) )
		{
			return '<div class="error" >'.$this->error($key).'</div>';
		}
	}

}
