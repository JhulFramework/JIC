<?php namespace _m\user\context;

class Handler extends \Jhul\Core\Application\Handler\_Class
{

	use \Jhul\Core\_AccessKey;

	public function switchTo()
	{
		return  !$this->app()->user()->isAnon() ? 'user#siu' : 'user#anon' ;
	}

}
