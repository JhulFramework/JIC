<?php namespace _modules\user\nodes\member\user\s\settings\password;


class Form extends \Jhul\Components\Form\EditDBEntity
{

	public function fields()
	{
		return
		[
			'password_old'		=> 'password',

			'password_new'		=> 'password',

			'password_new_confirm'	=> 'password',
		];
	}

	public function name()
	{
		return 'change_password';
	}

	public function postValidate()
	{

		if(  !$this->entity()->store()->matchPassword( $this->password_old, $this->entity()->password() ) )
		{
			$this->addError( 'password_old', 'Wrong Password!' );
		}

		if( strcmp( $this->password_new->value(), $this->password_new_confirm->value() ) !== 0 )
		{
			$this->addError( 'password_new_confirm', ' Does not match with password ' );
		}
	}

	public function save()
	{
		if( $this->validate() )
		{
			$this->entity()->write('password', $this->password_new )->commit() ;
			return TRUE;
		}

		return FALSE;
	}

	protected function stringKeys()
	{
		return
		[
			'Password', 'New Password', 'Retype New Password', 'Save',
		];
	}

}
