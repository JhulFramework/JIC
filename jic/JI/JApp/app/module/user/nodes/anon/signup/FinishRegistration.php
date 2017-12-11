<?php namespace _modules\user\activities\signup;

class FinishRegistration
{

	function run( $tmpUser )
	{
		$user = $tmpUser->persist();

		$tmpUser->clearGarbageAccounts();

		$this->com('User')->login( $user );

		return $this->redirect( $this->com('UrlProvider')->get('home') );
	}

}
