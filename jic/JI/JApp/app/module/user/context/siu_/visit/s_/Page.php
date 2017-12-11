<?php namespace _m\user\context\siu_\visit\s_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	public function makeWebPage()
	{
		$this->removeLayout('header');

		$this->title =  $this->app()->user()->name();
		$this->generate();
		$this->cookView();
	}
}
