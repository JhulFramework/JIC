<?php namespace _m\admin\context;

class Handler extends \Jhul\Core\Application\Handler\_Class
{
	public function isAccessible()
	{
		return !$this->getApp()->su()->isAnon();
	}

	public function nextHandler()
	{
		if( $this->mPath()->hasNext() )
		{
			if($this->app()->su()->canAdminModule( $this->mPath()->next() ) );
			{
				return $this->mPath()->next().'#admin' ;
			}
		}
	}

	public function handle()
	{

		$items = [];

		foreach ( $this->app()->su()->accessModules() as $module_key => $context )
		{
			$items[] = $module_key;
		}

		$this->module()->cook( 'index', [ 'items' => $items ] );
	}
}
