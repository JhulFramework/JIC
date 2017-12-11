<?php namespace _m\user\context\anon\visit_user;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{
		$host = Host::findByIName( $this->app()->mData()->get('host_iname') );

		if( null != $host )
		{
			$this->cookLocalFile( '_view', [ 'host' => $host ] );
		}
	}
}
