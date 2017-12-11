<?php namespace _m\user\context\siu_\read_;

class Page extends \Jhul\Core\Application\Page\_Class
{

	use \_m\webpage\view\_HasGenerator;


	public function ifAllowIndexing()
	{
		return FALSE ;
	}

	public function items()
	{
		return
		[
			'article' 	=>
			[
				'label'	=> 'लेख',
				'icon'	=> 'icon-article',
				'url'		=> $this->app()->url().'/read/article',
			],

			'shayari' 	=>
			[
				'label' => 'शायरी',
				'icon'	=> 'icon-quote-left',
				'url'		=> $this->app()->url().'/read/shayari',
			],
		];
	}

	public function makeWebpage()
	{
		$this->title = $this->app()->user()->iname();
		//$this->generate();
		$this->cookView( [ 'items' => $this->items(), 'base_url' => $this->app()->url().'/' ] );
	}

	public function user()
	{
		return $this->app()->user() ;
	}

}
