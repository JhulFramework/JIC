<?php namespace _m\user\addon\profile\dao\profile;

abstract class _Class
{
	private $_dataDAO;

	private $_styleDAO;

	private $_socialLinkDAO;

	private function __construct( $dataDAO )
	{
		$this->_dataDAO = $dataDAO;

		$styleDAOClass = static::getDAOClass( 'Style' );

		$this->_styleDAO = $styleDAOClass::find( $dataDAO->key() );

		$socialDAOClass =  static::getDAOClass( 'SocialLink' );

		$this->_socialLinkDAO = $socialDAOClass::find( $dataDAO->key() );
	}

	public static function getDAOClass( $name )
	{
		return \Jhul::I()->fx()->rChop(get_called_class()).'\\dao\\'.$name ;
	}

	public static function find( $userKey )
	{
		$dataDAOClass = static::getDAOClass( 'Data' );

		$dataDAO = $dataDAOClass::find( $userKey );

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

	public function write()
	{
		return $this->_styleDAO ;
	}

	public function links()
	{
		return $this->_socialLinkDAO ;
	}
}
