<?php namespace _modules\user\nodes\member\user\s;

class Handler extends \Jhul\Core\Application\Handler\_Class
{

	public function canHandleNextNode()
	{
		return TRUE;
	}

	public function nextNodeNames()
	{
		return
		[
			'pages'	=> 'syahi.usernode_s',
			//'settings'	=> __NAMESPACE__.'\\settings\\Settings',
		];
	}

	public function canHandle()
	{
		return 's' == $this->getApp()->user()->get( 'host' )->context() ;
	}

	public function handle()
	{
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
