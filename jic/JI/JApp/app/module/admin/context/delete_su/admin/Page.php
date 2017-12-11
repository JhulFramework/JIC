<?php namespace _m\admin\context\su\admin;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function nextNodeNames()
	{
		return
		[
			'blog'	=> 'blog#admin',
			'gui'		=> 'gui#admin',
			'kahani'	=> 'kahani#admin',
			'android'	=> 'android#admin',
			'tag' 	=> 'tag#admin',
			'shayari' 	=> 'shayari#admin',

		];
	}

	public function makeWebPage()
	{
		$items = [];

		foreach ($this->nextNodeNames() as $item => $h )
		{
			if( $this->app()->m('admin')->su()->canAccess( $item ) )
			{
				$items[] = $item;
			}
		}

		$this->cook( 'index', [ 'items' => $items ] );
	}
}
