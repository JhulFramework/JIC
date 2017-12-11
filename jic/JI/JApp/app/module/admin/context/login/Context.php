<?php namespace _m\admin\context\login;

class Context extends \Jhul\Core\Application\Context
{
	public function isAccessible()
	{
		return $this->app()->su()->isAnon() ;
	}
}
