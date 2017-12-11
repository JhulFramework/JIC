<?php namespace _modules\user\models\member\login;

/* @Author : manish dhruw < eskylite@gmail.com >
+=======================================================================================================================
|
+---------------------------------------------------------------------------------------------------------------------*/


class Form extends \Jhul\Components\Form\_Class
{

	private $_authorizedUser;

	public function name()
	{
		return 'login';
	}

	public function fields()
	{
		return
		[
			'password'	=> 'password',
		];
	}

	public function login()
	{
		$this->validate();

		if( $this->authorizeUser() )
		{
			return $this->getApp()->user()->login( $this->_authorizedUser );
		}
	}

	public function authorizedUser()
	{
		return $this->_authorizedUser;
	}

	public function postValidate()
	{
		if( !$this->hasError() )
		{
			$login_key = $this->fieldValue( 'login_key' );

			$this->login_key =  strpos( $login_key , '@' ) ? $this->mDataType('login_email')->make( $login_key ) : $this->mDataType('iname')->make( $login_key ) ;

			if( $this->login_key->isValid() ) return TRUE;

			$this->addError( 'login_key', 'ERROR_USER_NOT_FOUND' );
		}
	}

	public function authorizeUser()
	{

		if( !$this->validate() ) return FALSE;

		if( 'email' == $this->login_key->type()  )
		{
			$user = $this->dispenser()->byEmail( $this->login_key->value() )->fetch() ;

		}
		else
		{
			$user = $this->dispenser()->byIName( $this->login_key->value() )->fetch() ;
		}


		if( !$user->isNULL() )
		{




			if( $user->matchPassword($this->password->value())  )
			{

				 $this->_authorizedUser = $user;

				 $this->onAuthorizationSuccess( $user->key()  );
				 return TRUE;
			}
			else
			{
				$this->onAuthorizationFail( $user->key() );
				$this->addError( 'password', 'ERROR_WRONG_PASSWORD!' );
			}
		}


		if( $user->isNULL() )
		{
			$this->addError('login_key','ERROR_USER_NOT_FOUND'  );
		}
	}


	public function JSONResponse()
	{
		$form = new \stdClass();

		$form->antiCSRFToken = $this->antiCSRFToken()->value();

		if( NULL != $this->error('password') )
		{
			$form->error = $this->string('WRONG_PASSWORD');
		}

		if( NULL != $this->error('iName') )
		{
			$form->error = $this->string("WRONG_INAME");
		}


		$form->user = $this->getApp()->user()->m();

		return $form;
	}

	public function stringKeys()
	{
		return
		[
			'WRONG_PASSWORD', 'Login', 'Register', 'Password', 'Forgot Password', 'IName or Email', 'Login With Google+', 'Login With Facebook'
		];
	}

	public function dispenser()
	{
		return $this->module()->mUser()->dispenser('login');
	}
}
