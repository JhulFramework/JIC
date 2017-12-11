<?php namespace _modules\user\models\member;

trait _Getters
{
	private $_kitaab;

	public function avatar( $object = FALSE )
	{
		if( $object )
		{
			return $this->eav( 'avatar' );
		}

		return $this->getApp()->mDataType('avatar')->url( $this->read('avatar') );

	}

	public function gender()
	{
		return $this->read('gender');
	}

	public function getEav( $name, $asObject = FALSE )
	{
		return $asObject ? $this->eav( $name ) : $this->read( $name, TRUE );
	}

	public function iName( $eav = FALSE )
	{
		if( $eav )
		{
			return $this->eav( 'iname' );
		}

		return $this->read('iname');
	}

	public function name( $eav = FALSE )
	{
		return $this->getEAV( 'name', $eav );
	}

	public function tagLine()
	{
		return $this->read( 'tagline' );
	}

	public function kitaab()
	{
		if( NULL == $this->_kitaab )
		{
			$this->_kitaab = $this->module()->getKitaab( $this ) ;
		}

		return $this->_kitaab;
	}

	public function url( $suffix = NULL )
	{
		if($suffix)
		{
			return $this->getApp()->url().'/@'.$this->iName().'/'.$suffix;
		}

		return $this->getApp()->url().'/@'.$this->iName();
	}
}
