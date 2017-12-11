<?php namespace _modules\user\nodes\cuser;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage() { }

	public function makeJSON()
	{
		$this->cook
		([
			'name' 	=> $this->user()->name(),
			'iname' 	=> $this->user()->iname(),
			'gender' 	=> $this->user()->gender(),
			'avatar' 	=> $this->user()->avatar(),
			'key'		=> $this->user()->key(),
		]);
	}

	public function user()
	{
		return $this->getApp()->user();
	}
}
