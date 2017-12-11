<?php namespace _m\user\context\siu_;

class Context extends \Jhul\Core\Application\Module\Context\_Class
{
	public function isAccessible()
	{
		return !$this->app()->user()->isAnon() ;
	}

	public function daoMap()
	{
		return
		[
		 	__NAMESPACE__.'\\dao\\User' => '*',
		];
	}
}
