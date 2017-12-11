<?php namespace _m\user\context\siu_\create_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	public function ifAllowIndexing()
	{
		return FALSE;
	}

	public function items()
	{
		return
		[
			'article' 	=>
			[
				'label' 	=> 'लेख',
				'icon'	=> 'icon-article',
				'url'		=> $this->app()->url().'/create/article',
			],

			'shayari' 	=>
			[
				'label'	=> 'शायरी',
				'icon'	=> 'icon-quote-left',
				'url'		=> $this->app()->url().'/create/shayari',
			],
		];
	}

	public function makeWebpage()
	{
		$this->title = $this->app()->user()->iname();
		$this->generate();
		$this->cookView( [ 'items' => $this->items() ] );
	}

	public function user()
	{
		return $this->app()->user() ;
	}

}
