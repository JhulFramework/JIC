<?php namespace _modules\user\design\user;

//Model to control acces between host and visitor

class _Access
{

	// User who is visiting
	protected $_host ;

	protected $_visitor;

	public function __construct( $host )
	{
		$this->_host = $host;
	}

	public function host()
	{
		return $this->_host;
	}

	public function setVisitor( $visitor )
	{
		$this->_visitor = $visitor;
		return $this;
	}

	public function visitor()
	{
		return $this->_visitor;
	}

	//Perspective
	public function p()
	{
		if( $this->visitor()->isNULL() ) return 'a';

		if( $this->visitor()->ik() == $this->host()->ik() ) return 's';

		return 'o';
	}
}
