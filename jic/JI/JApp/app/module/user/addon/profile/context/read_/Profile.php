<?php namespace _m\user\addon\profile\context\read_;

class Profile
{
	private $_dataDAO;

	private $_styleDAO;

	private $_socialDAO;
	private $_socialHTML;

	private function __construct( $dataDAO )
	{
		$this->_dataDAO = $dataDAO;

		$this->_styleDAO = dao\Style::find( $dataDAO->key() );
		$this->_socialDAO = dao\SocialLink::find( $dataDAO->key() );

		$this->_socialHTML = new dao\SocialLinkHTML($this->_socialDAO);

	}

	public static function find( $userKey )
	{
		$dataDAO = dao\Data::find( $userKey );

		if( NULL != $dataDAO )
		{
			return new static( $dataDAO ) ;
		}

		return NULL ;
	}

	public function data()
	{
		return $this->_dataDAO ;
	}

	public function social()
	{
		return $this->_socialDAO ;
	}

	public function socialHTML()
	{
		return $this->_socialHTML ;
	}

	public function style()
	{
		return $this->_styleDAO ;
	}
}
