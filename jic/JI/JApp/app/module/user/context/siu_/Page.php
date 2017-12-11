<?php namespace _m\user\context\siu_;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function ifAllowIndexing()
	{
		return FALSE ;
	}

	public function items()
	{
		return
		[
			'chat' 					=>[ 'label' => 'गपशप' ],
			'read' 					=>[ 'label' => 'पढ़े' ],
			'write' 					=>[ 'label' => 'लिखें' ],
			'settings' 					=>[ 'label' => 'व्यवस्था' ],
			'@'.$this->app()->user()->iname() 	=>[ 'label' => 'मेरा परिचय' ],

		];
	}

	public function makeWebpage()
	{
		$this->title = $this->getApp()->user()->iname();

		$this->cook( 'main.simple_index_array', [ 'items' => $this->items(), 'base_url' => $this->app()->url().'/' ] );
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
