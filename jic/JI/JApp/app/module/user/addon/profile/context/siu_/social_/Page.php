<?php namespace _m\user\addon\profile\context\siu_\social_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	protected $_action;

	public function item()
	{
		return $this->context()->item() ;
	}


	public function makeWebPage()
	{

		if( $this->form()->isSubmitted() )
		{
			$this->form()->save();
		}

		$this->generate();

		$this->cookView( ['form' => $this->form()] ) ;
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
