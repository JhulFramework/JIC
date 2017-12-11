<?php namespace _modules\user\nodes\anon\signup\verification;

class Activity extends \Jhul\Core\Application\Node\Activity\_Class
{

	public function cookWebPage()
	{
		$form = new Form( $this->getApp()->mData()->get('account') );


		//colection form data and verifying
		if( $form->collect()  )
		{
			if( $form->validate() )
			{

				$newuser = $form->account()->persist();

				$loginModel =  $this->module()->mUser()->findByKey( 'login', $newuser->key() );

				$this->getApp()->user()->login(  $loginModel );

				return $this->getApp()->redirect( $this->getApp()->URL() ) ;
			}

			if( $form->account()->ifVerificationAttemptLimitReached() )
			{
				$form->account()->delete();
				return $this->getApp()->redirect( $this->getApp()->URL() ) ;
			}
		}


		$this->cook( 'email_verification', [ 'form' => $form ] );
	}

	public function cookJSON()
	{
		$form = new Form( $this->data()->get('email') );


		//colection form data and verifying
		if( $form->collect() )
		{
			if(  $form->validate()  )
			{
				$this->getApp()->user()->login(  $form->email()->getUser()->makeVerified() );
			}
		}

		$this->addJData( 'Vform', $form->JSONResponse() );

	}

}
