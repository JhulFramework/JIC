<?php namespace _m\admin\context\login;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage()
	{

		if( $this->getApp()->user()->isAnon() )
		{
			return $this->processLogin();
		}

		$this->getApp()->response()->page()->addContent( '<div class="uk-section"><div class="uk-container"> <h1>You are already logged in</h1> </div></div>' );
	}

	public function processLogin()
	{
		$form = new Form;

		if( $form->isSubmitted() )
		{
			if( $form->login() )
			{
				$this->getApp()->redirect( $this->getApp()->url().'/admin' );
			}
		}



		$this->cook('login', [ 'form' =>$form ] );
	}
}
