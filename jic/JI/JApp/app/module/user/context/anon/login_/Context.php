<?php namespace _m\user\context\anon\login_;

class Context extends \Jhul\Core\Application\Module\Context\_Class
{
	public function isAccessible()
	{
		return $this->app()->user()->isAnon() ;
	}

	public function DAOMap()
	{
		return
		[
			__NAMESPACE__.'\\M' => '*',
		];
	}
}
