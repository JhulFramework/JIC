<?php namespace app;

class User extends \Jhul\Core\Application\User\_Class
{


	public function sessionStoreKey()
	{
		return 'user';
	}

	public function keyName()
	{
		return 'user_key';
	}

	public function iname()
	{
		return $this->getState('iname');
	}

	public function name()
	{
		return $this->getState('name');
	}

	public function url()
	{
		return $this->app()->url().'/@'.$this->iname();
	}

	public function tagline()
	{
		return $this->getState('tagline');
	}

	public function avatar()
	{
		return $this->getState('avatar');
	}

	public function DAOClass()
	{
		return '\\_m\\user\\context\\siu_\\dao\\User';
	}


}
