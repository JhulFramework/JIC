<?php namespace _m\user\addon\profile\context\siu_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	protected $_action;

	protected function items()
	{
		return
		[
			'info'		=>
			[
				'label'	=> 'जानकारी',
				'icon'	=> 'icon-info',
				'page' 	=> __NAMESPACE__.'\\info_\\Page',
				'url'		=> $this->app()->url().'/settings/?a=profile&type=info',
			],

			'social'		=>
			[
				'label'	=> 'सोशल लिंक',
				'icon'	=> 'icon-www',
				'page' 	=> __NAMESPACE__.'\\social_\\Page',
				'url'		=> $this->app()->url().'/settings/?a=profile&type=social',

			],

		];
	}



	public function makeWebPage()
	{

		$profile  = Profile::find( $this->app()->user()->key());

		$action = $this->getAction();
		if( isset( $this->items()[$action] ) )
		{
			$page = $this->items()[$action]['page'];

			return $page::I()->make();
		}


		$this->generate();
		$this->cookView( ['items' => $this->items() ] ) ;
	}

	protected function getAction()
	{
		if( empty($this->_action) && isset($_GET['type']) )
		{
			$this->_action = $_GET['type'];
		}

		return $this->_action;
	}
}
