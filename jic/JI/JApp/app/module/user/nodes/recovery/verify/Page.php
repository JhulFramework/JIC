<?php namespace _modules\user\nodes\recovery\verify;

/*
+=======================================================================================================================

	- find reset link record user key which we get from url ( exist or not )
		- if not exist return NULL
		- if exists continue

	- check if link time valid( timeout or not )
		- if not time valid, delete and return null
		- if valid continue

	- match token and incriment attempt
		- if not match, check if anymore attempt allow
			- if attaempts allowed continue
			- if attempts not allowed delete and return null
		- if match continue

+---------------------------------------------------------------------------------------------------------------------*/

use _modules\user\nodes\recovery\db\ResetLink;

class Page extends \Jhul\Core\Application\Page\_Class
{

	private $_userKey;

	private $_token;

	public function makeWebPage()
	{
		if( NULL == $this->userKey() && NULL == $this->token() ) return ;

		$resetLink = ResetLink::D()->byKey( $this->userKey() )->fetch();

		// checking if reset link valid
		if( $resetLink->isNULL() ) return;


		if( !$resetLink->isValid() )
		{
			$resetLink->delete();
			return;
		}

		// checking if token valid
		if( !$resetLink->match( $this->token() ) )
		{
			if( !$resetLink->isValid() )
			{
				$resetLink->delete();
			}

			return;
		}

		$this->title = 'Password Reset';

		$form = new Form( $resetLink ) ;

		if( $form->isSubmitted() && $form->verifyToken()  )
		{

			if( $form->save()  )
			{
				return $this->cookText( $form->cookHTMLNotification() );
			}
		}

		if( !$this->app()->m('webpage')->has( $form->name() ) )
		{
			$this->app()->m('webpage')->makeAndCache( 'form', new View($form) );

		}

		$this->cook(  'webpage.'.$form->name() , [ 'form' => $form ] );
	}

	protected function userKey()
	{
		if( empty($this->_userKey))
		{
			if( isset($_GET['k']) && ctype_digit($_GET['k']) )
			{
				$this->_userKey = $_GET['k'];
			}
		}

		return $this->_userKey;
	}

	protected function token()
	{
		if( empty($this->_token))
		{
			if( isset($_GET['t']) && ctype_digit($_GET['t']) )
			{
				$this->_token = $_GET['t'];
			}
		}

		return $this->_token;
	}

}
