<?php namespace _m\user\context\anon\login_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator ;

	public function makeWebPage()
	{
		$this->app()->mapper()->registerView( $this->module()->key(),  'login', __DIR__.'/res/view' );

		if( $this->form()->isSubmitted() && $this->form()->verifyToken() && $this->form()->validate() )
		{
			if( $this->form()->login() )
			{
				$this->app()->redirect( $this->app()->URL() );
			}
		}

		$this->title = 'Login';

		$this->ifEnableIndexing = TRUE;

		//$this->generate();
		$this->cookView( [ 'form' => $this->form() ] );
	}

	public function makeJSON()
	{

		$ifLoggedIn =  FALSE;

		if( $this->form()->isSubmitted() && $this->form()->verifyToken()  )
		{
			if(   $this->form()->login()  )
			{
				$this->cook( 'if_login_success', TRUE );
			}
			else
			{
				$this->cook( 'key_error', $this->form()->error('login_key') );
				$this->cook( 'password_error', $this->form()->error('password') );
			}
		}

		$this->cook( 'token', $this->form()->token()->value() );
		$this->cook( 'ifLoggedIn', $ifLoggedIn );

	}


}
