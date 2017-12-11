<?php namespace _m\user\context\siu\visit\o;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{
		$this->title =  $this->app()->user()->name();
		$this->cookLocalFile( '_view' );
	}
}
