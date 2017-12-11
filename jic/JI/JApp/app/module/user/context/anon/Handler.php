<?php namespace _m\user\context\anon;

class Handler extends \Jhul\Core\Application\Handler\_Class
{
	use \Jhul\Core\_AccessKey;

	public function isAccessible()
	{
		return $this->app()->user()->isAnon();
	}

	public function switchTo()
	{
		if( 'shayari' == $this->mPath()->current() )
		{
			return 'shayari#anon' ;
		}

		if( 'article' == $this->mPath()->current() )
		{
			return 'article#anon' ;
		}
	}

	public function handle()
	{
		if( '' == $this->mPath()->current() )
		{
			return $this->makePage('user@login');
		}

		if(  $this->route()->hasParam( 'host_iname') )
		{
			$this->app()->mData()->add('host_iname',  $this->route()->getParam( 'host_iname', 'iname' )->value() );

			return $this->makePage('user@visit_user_anon');
		}

		if( 'login' == $this->mPath()->current() )
		{
			return $this->makePage('user@login');
		}



	}
}
