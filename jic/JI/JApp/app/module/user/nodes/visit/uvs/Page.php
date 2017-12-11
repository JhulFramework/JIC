<?php namespace _modules\user\nodes\visit\uvs;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{
		$this->title =  $this->app()->user()->name();
		$this->cookLocalFile( '_view' );
	}
}
