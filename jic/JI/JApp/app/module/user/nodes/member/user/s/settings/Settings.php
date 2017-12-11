<?php namespace _modules\user\nodes\member\user\s\settings;

class Settings extends \Jhul\Core\Application\Page\_Class
{

	protected $_action;


	protected $_settings =
	[
		'email'		=> __NAMESPACE__.'\\email\\Page',
		'avatar'		=> __NAMESPACE__.'\\avatar\\Page',
		'tagline'		=> __NAMESPACE__.'\\tagline\\Page',
		'personal'		=> __NAMESPACE__.'\\personal\\Page',
		'password'		=> __NAMESPACE__.'\\password\\Page',
		'language'		=> __NAMESPACE__.'\\l10n\\Page',
			//'background'	=> __NAMESPACE__.'\\background\\BackgroundSettings',
	];

	public function makeWebPage()
	{
		$action = $this->getAction();

		//$this->title = 'Settings';

		if( isset( $this->_settings[$action] ) )
		{
			$page = $this->_settings[$action];

			return $page::I()->make();
		}

		return $this->cook( 'user_settings' ) ;
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
