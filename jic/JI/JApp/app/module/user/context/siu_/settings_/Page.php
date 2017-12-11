<?php namespace _m\user\context\siu_\settings_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	protected $_action;

	protected function items()
	{
		return
		[
			'avatar' =>
			[
				'label'	=> 'तस्वीर बदलें',
				'icon'	=> 'icon-camera',
				'page' 	=> __NAMESPACE__.'\\avatar_\\Page',
				'url'		=>  $this->app()->url().'/settings/?a=avatar',
			],

			'tagline' =>
			[
				'label'	=> 'पसंदीदा पंक्तिया',
				'icon'	=> 'icon-quote-left',
				'page' 	=> __NAMESPACE__.'\\tagline\\Page',
				'url'		=>  $this->app()->url().'/settings/?a=tagline',

			],

			'personal' =>
			[
				'label'	=> 'व्यक्तिगत जानकारी',
				'icon'	=> 'icon-user',
				'page' 	=> __NAMESPACE__.'\\personal_\\Page',
				'url'		=>  $this->app()->url().'/settings/?a=personal',

			],

			'password' =>
			[
				'label'	=> 'गुप्तशब्द बदलें',
				'icon'	=> 'icon-lock',
				'page' 	=> __NAMESPACE__.'\\password_\\Page',
				'url'		=>  $this->app()->url().'/settings/?a=password',

			],

			'profile' =>
			[
				'label'	=> 'जानकारी',
				'icon'	=> 'icon-user',
				'page' 	=> $this->module()->addon('profile')->context('siu')->page(),
				'url'		=>  $this->app()->url().'/settings/?a=profile',

			],
		];
	}

	public function makeWebPage()
	{
		$action = $this->getAction();

		if( isset( $this->items()[$action] ) )
		{
			$page = $this->items()[$action]['page'];

			return $page::I()->make();
		}

		//$this->generate();
		$this->cookView( ['items' => $this->items(), 'base_url' => $this->app()->url().'/settings/?a=' ] ) ;
	}

	protected function getAction()
	{
		if( empty($this->_action) && isset($_GET['a']) )
		{
			$this->_action = $_GET['a'];
		}

		return $this->_action;
	}
}
