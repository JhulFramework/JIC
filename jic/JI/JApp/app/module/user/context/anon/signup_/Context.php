<?php namespace _m\user\context\anon\signup;

class Context extends \Jhul\Core\Application\Context
{
	public function isAccessible()
	{
		return $this->app()->user()->isAnon() ;
	}

	private $_newUser;

	public function item()
	{
		if( empty($this->_newUser) )
		{
			$this->_newUser = new dao\User;
		}

		return $this->_newUser ;
	}
}
