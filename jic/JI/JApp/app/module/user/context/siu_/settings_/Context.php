<?php namespace _m\user\context\siu_\settings_;

class Context extends \Jhul\Core\Application\Module\Context\_Class
{
	public function isAccessible()
	{
		return !$this->app()->user()->isAnon();
	}

	private $_editUser;


	public function user()
	{
		if( empty($this->_editUser) )
		{
			$this->_editUser = dao\User::find( $this->app()->user()->key() );

		}

		return  $this->_editUser;
	}

	public function item()
	{
		return $this->user() ;
	}

	public function daoMap()
	{
		return
		[
			__NAMESPACE__.'\\dao\\User' => '*',
		];
	}
}
