<?php namespace _m\user\context\anon\signup;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	public function makeWebPage()
	{

		//$this->form() = new Form( new \_modules\user\models\anon\User ) ;

		if( $this->form()->isSubmitted() && $this->form()->verifyToken() && $this->form()->validate()  )
		{
			if( $this->form()->save()  )
			{
				if( $this->app()->mDataType('signup_email')->ifVerificationRequired() )
				{
					return $this->app()->redirect( $this->app()->url( 'account_verification/'.$this->form()->email ) );
				}
				else
				{
					$user = $this->form()->entity()->persist();

					$login_user = \_m\user\context\anon\login\M::D()->byKey( $user->key() )->fetch();

					$this->app()->user()->login( $login_user );

					return $this->app()->redirect( $this->app()->url() ) ;
				}
			}
		}

		$this->title = 'SIGN UP';

		$this->ifEnableIndexing = TRUE;

		$this->generate();
		$this->cookView( [ 'form' => $this->form() ] );

	}


	public function makeJSON()
	{
		if( $this->form()->isSubmitted() )
		{
			 if( $this->form()->save() )
			 {
				 $this->cook( 'if_signup_success', TRUE );

				 $user = $this->form()->entity()->persist();

				 $login_user = \_modules\user\nodes\login\M::D()->byKey( $user->key() )->fetch();
			 }
			 else
			 {
				 $this->cook( 'name_error', $this->form()->error('name')  );
				 $this->cook( 'email_error', $this->form()->error('signup_email')  );
				 $this->cook( 'password_error', $this->form()->error('password')  );
			 }
		}

	}

}
