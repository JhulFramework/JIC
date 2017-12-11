<?php namespace _modules\user\nodes\home;

class Handler extends \Jhul\Core\Application\Handler\_Class
{

	public function canHandleNextNode()
	{
		return TRUE;
	}

	public function switchTo()
	{
		if('settings' == $this->mPath()->next() ) return __NAMESPACE__.'\\settings\\Page'
	}

	public function nextNodeNames()
	{
		return
		[
			'pages'	=> 'syahi.usernode_s',
			'settings'	=> __NAMESPACE__.'\\settings\\Settings',
		];
	}

	public function canHandle()
	{
		return 's' == $this->getApp()->user()->get( 'host' )->context() ;
	}

	public function handle()
	{
		if( $this->mPath )
		if( 'settings' == $this->mPath()->next() )
		{
			return $this->renderLocalPage( 'settings\\Settings' );
		}



		if( !$this->mPath()->hasNext() )
		{
			return $this->makePage();
		}
	}

}
