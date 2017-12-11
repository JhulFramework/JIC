<?php namespace _modules\user\datatypes\email\signup;

class Signup extends \_modules\user\datatypes\email\login\Login
{

	use \Jhul\Core\_AccessKey;

	//@Override String to email
	public function dataType(){ return 'signup_email'; }

	public function __construct()
	{
		parent::__construct();

		$this->mErrorCode()->add( 'validateNotUsed', 'EMAIL_ALREADY_IN_USE' );
	}


	//Check if email is NOT already used
      public function validateNotUsed( $email )
      {
            return $this->module()->mUser()->findByEmail( $email, 'exists' )->isNULL() ;
      }

      public function generateVerificationCode()
      {
            return $this->module()->security()->randomKey(6);
      }

	public function ifVerificationRequired()
	{
		return $this->config( 'if_verification_required' );
	}

	public function VerificationAttemptLimit()
	{
		return $this->config('verification_attempt_limit');
	}

	public function primary( $email )
	{
		$email =  new Primary( $email );

		if( NULL != $email->getUser() )
		{
			return $email;
		}
	}


}
