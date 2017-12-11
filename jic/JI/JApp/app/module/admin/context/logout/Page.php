<?php namespace _m\admin\context\logout;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage()
	{
		$this->getApp()->su()->logout() ;
		$this->getApp()->redirect( $this->getApp()->url() );
	}
}
