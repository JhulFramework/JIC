<?php namespace _modules\user\nodes\recovery ;

class Form extends \Jhul\Components\Form\_Class
{

	private $_user;

	private $_resetLink;

	public function user() { return $this->_user; }

	public function name() { return 'recovery_create'; }

	//used to vliadte user submitted data
	public function fields()
	{
		return [ 'login_email', ];
	}

	public function generateResetLink()
	{
		if( $this->validate() )
		{
			$this->_resetLink = db\ResetLink::I()->store()->generateResetLink( $this->_user );

			$this->prepareMail()->dispatch();

			return TRUE;
		}

		return FALSE;
	}

	public function postValidate()
	{
		$this->_user = $this->module()->mUser()->findByEmail( $this->login_email->value(), 'write' );

		if( !$this->user()->isNULL() )
		{
			return TRUE;
		}

		$this->addError( 'email', 'ACCOUNT_NOT_FOUND' );
	}


	public function cookHTMLNotification()
	{
		return $this->getApp()->lipi()->T( 'PASSWORD_RESET_LINK_MAILED_NOTIFICATION', [ 'email' => $this->login_email->value() ] );
	}

	public function prepareMail()
	{
		return $this->J()->cx('mailer')->newMessage()

		->setSubject('Password Reset')

		->setTo( [ $this->_user->read('email') => $this->_user->read('name') ] )

		->setBody
		(
			$this->getApp()->lipi()->T( 'PASSWORD_RECOVER_EMAIL_BODY',
			[
				'link' 	=> $this->_resetLink->link(),
				'name'	=> $this->_user->name(),
				'website'	=> $this->app()->name(),
			] ),

			'text/plain'
		);

	}
}
