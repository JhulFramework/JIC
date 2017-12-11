<?php namespace _modules\user\nodes\home\settings;

class Page extends \Jhul\Core\Application\Page\_Class
{
	protected $_action;

	public function isAccessible()
	{
		return !$this->app()->user()->isAnon();
	}

	protected function items()
	{
		return
		[
			'avatar'		=>
			[
				'label'	=> 'अवतार बदलें',
				'page' 	=> __NAMESPACE__.'\\avatar\\Page',
			],

			'tagline'		=>
			[
				'label'	=> 'पसंदीदा पंक्तिया',
				'page' 	=> __NAMESPACE__.'\\tagline\\Page',
			],

			'personal'		=>
			[
				'label'	=> 'व्यक्तिगत जानकारी',
				'page' 	=> __NAMESPACE__.'\\personal\\Page',
			],

			'password'		=>
			[
				'label'	=> 'गुप्तशब्द बदलें',
				'page' 	=> __NAMESPACE__.'\\password\\Page',
			],

			// 'language'		=>
			// [
			// 	'label'	=> 'Language',
			// 	'page' 	=> __NAMESPACE__.'\\l10n\\Page',
			// ],
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

		return $this->cook(  'main.simple_index_array' , ['items' => $this->items(), 'base_url' => $this->app()->url().'/settings/?a=' ] ) ;
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
