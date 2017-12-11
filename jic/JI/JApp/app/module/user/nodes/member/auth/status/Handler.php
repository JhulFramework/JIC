<?php namespace _modules\user\nodes\member\auth\status;

class Handler extends \Jhul\Core\Application\Node\Handler\_Class
{
	public function handle()
	{
		if( $this->getApp()->user()->isJSONConsumer() )
		{
			return $this->getApp()->OutputAdapter()->cook( 'ifSignedIn', $this->getApp()->user()->isSigned() );
		}
	}
}
