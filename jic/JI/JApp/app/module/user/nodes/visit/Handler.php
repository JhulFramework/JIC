<?php namespace _modules\user\nodes\visit;

class Handler extends \Jhul\Core\Application\Handler\_Class
{
	//its not handling, but its acts as intermediate hndler
	//public function canHandle(){ return FALSE; }

	public function handle()
	{
		if( !$this->app()->user()->isAnon() )
		{
			if( $this->app()->user()->iname() == $this->route()->getParam( 'host_iname', 'iname' )->value()  )
			{
					return $this->makeLocalPage( 'uvs\\Page' );

			}

			//$host = $this->module()->mUser()->findHost( $this->route()->getParam( 'host_iname', 'iname' )->value()  );
		}

		// $this->getApp()->user()->set( 'host',  $host );
		//
		// $this->makeLocalPage( $host->context().'\\Page' );

		return $this->makePage( '\\_m\\user\\context\\user\\anon\\visit_host\\Page' );
	}

}
