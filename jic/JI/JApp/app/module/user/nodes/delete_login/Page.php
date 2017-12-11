<?php namespace _modules\user\nodes\login;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{
		$this->getApp()->mapper()->registerView( $this->module()->key(),  'login', __DIR__.'/res/view' );

		$form = new Form ;

		if( $form->isSubmitted() && $form->verifyToken() && $form->validate() )
		{

			if( $form->login() )
			{
				$this->getApp()->redirect( $this->getApp()->URL() );
			}
		}

		$this->title = 'Login';


		if( !$this->app()->m('webpage')->has( $form->name() ) )
		{
			$this->app()->m('webpage')->makeAndCache( 'form', new View($form) );

		}

		$this->cook(  'webpage.'.$form->name() , [ 'form' => $form ] );
	}

	public function makeJSON()
	{
		$form = new Form;

		$ifLoggedIn =  FALSE;

		if( $form->isSubmitted() && $form->verifyToken()  )
		{
			if(   $form->login()  )
			{
				$this->cook( 'if_login_success', TRUE );
			}
			else
			{
				$this->cook( 'key_error', $form->error('login_key') );
				$this->cook( 'password_error', $form->error('password') );
			}
		}

		$this->cook( 'token', $form->token()->value() );
		$this->cook( 'ifLoggedIn', $ifLoggedIn );

	}
}
