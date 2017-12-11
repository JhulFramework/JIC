<?php namespace _m\user\context\logout;

class Handler extends \Jhul\Core\Application\Handler\_Class
{
	public function handle()
	{
		$this->app()->user()->logout();
		$this->app()->redirect( $this->app()->url() );
	}
}
