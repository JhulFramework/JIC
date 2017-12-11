<?php namespace _modules\user\nodes\member\user\o;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage()
	{
		$this->title = $this->getApp()->user()->get('host')->name();

		$this->indexing = TRUE;

		$this->cook( 'profile_a', [ 'host' => $this->getApp()->user()->get('host') ] );
	}

}
