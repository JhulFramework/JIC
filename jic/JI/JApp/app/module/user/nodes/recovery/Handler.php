<?php namespace _modules\user\nodes\recovery;

class Handler extends \Jhul\Core\Application\Handler\_Class
{

	public function isAccessible()
	{
		return $this->app()->user()->isAnon();
	}

	public function canHandleNextNode()
	{
		return TRUE;
	}

	public function handle()
	{
		if( NULL == $this->mPath()->next() )
		{
			return $this->makePage();
		}

		if( 'verify' == $this->mPath()->next() )
		{
			return $this->makeLocalPage('verify\\Page');
		}
	}

}
