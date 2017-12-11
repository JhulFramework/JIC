<?php namespace _m\user\context\anon\signup\verification;

/* @Author : Manish Dhruw < eskylite@gmail.com >
+=====================================================================================================================*/

class Form extends \Jhul\Components\Form\_Class
{

	//account to verify
	private $_account;

	private $_ifSuccess = FALSE;

	public $verificationCodeKey = 'code';

	private $_verificationCodeValue ;

	public function name()
	{
		return 'account_verification';
	}

	public function fields()
	{
		return
		[
			$this->verificationCodeKey => 'alnum'
		];
	}

	public function __construct( $account )
	{
		parent::__construct();
		$this->_account = $account;
	}

	public function account()
	{
		return $this->_account;
	}



	public function postValidate()
	{
		if( $this->account()->verifyCode( $this->code ) )
		{
			$this->_ifSuccess = TRUE;
		}
		else
		{
			$this->addError(  $this->verificationCodeKey , 'Wrong Code' );
		}
	}

	public function JSONResponse()
	{

		$form = new \stdClass();

		$form->ifSuccess = $this->_ifSuccess;

		$form->error = $this->error( $this->verificationCodeKey );

		$form->user = $this->getApp()->client()->JSONResponse();

		return $form;
	}
}
