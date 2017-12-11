<?php namespace _m\user\context\anon\login_;


class Handler extends \Jhul\Core\Application\Handler\_Class
{
	public function isAccessible()
	{
		return $this->getApp()->user()->isAnon() ;
	}

	public function handle()
	{
		return $this->makePage();
	}
}
