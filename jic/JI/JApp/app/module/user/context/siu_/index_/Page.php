<?php namespace _m\user\context\siu_\index_;

class Page extends \Jhul\Core\Application\Page\_Class
{

	use \_m\webpage\view\_HasGenerator;

	public function items()
	{
		return
		[

			[
				'label' => 'गपशप',
				'icon' => 'icon-chat',
				'url'	=> $this->app()->url().'/chat',
			],

			[
				'label' => 'पढ़े',
				'icon' => 'icon-article',
				'url'	=> $this->app()->url().'/read',

			],

			[
				'label' => 'लिखें',
				'icon' => 'icon-feather',
				'url'	=> $this->app()->url().'/write',

			],


			[
				'label' => 'मेरा परिचय',
				'icon' => 'icon-user',
				'url'	=> $this->app()->url().'/@'.$this->user()->iname(),

			],

			[
				'label' => 'व्यवस्था',
				'icon' => 'icon-cogs',
				'url'	=> $this->app()->url().'/settings',

			],
		];
	}

	public function makeWebpage()
	{
		$this->title = $this->user()->iname();

		//$this->generate();
		$this->cookView( [ 'items' => $this->items() ] );
	}

	public function makeJSON()
	{
		if( $this->hasQuery('get', 'user') )
		{
			$this->cook( 'key', 	$this->user()->key() );
			$this->cook( 'name', 	$this->user()->name() );
			$this->cook( 'tagline', $this->user()->tagline() );
			$this->cook( 'iname', 	$this->user()->iname() );
			$this->cook( 'avatar', 	$this->user()->avatar() );
		}
	}

	public function user()
	{
		return $this->app()->user() ;
	}

}
