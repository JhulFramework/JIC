<?php namespace _m\user\context\siu_;

class Handler extends \Jhul\Core\Application\Handler\_Class
{


	public function isAccessible()
	{
		return !$this->app()->user()->isAnon();
	}

	public function switchTo()
	{
		if( 'shayari' == $this->mPath()->current()  )
		{
			return 'shayari#siu' ;
		}
		if( 'article' == $this->mPath()->current()  )
		{
			return 'article#siu' ;
		}

		if( 'read' == $this->mPath()->current()  )
		{
			return 'user#siu_read' ;
		}
	}


	public function handle()
	{
		if( '' == $this->mPath()->current()  )
		{
			return  $this->makePage('siu_index');
		}

		if(  $this->route()->hasParam( 'host_iname') )
		{
			if( $this->app()->user()->iname() == $this->route()->getParam( 'host_iname', 'iname' )->value()  )
			{
				return  $this->makeLocalPage('visit\\s_\\Page') ;
			}

			$this->app()->mData()->add('host_iname',  $this->route()->getParam( 'host_iname', 'iname' )->value() );

			return $this->makePage('user@visit_user_anon');
		}

		if( 'settings' == $this->mPath()->current()  )
		{
			return $this->makePage('siu_settings');
		}
	}

}
