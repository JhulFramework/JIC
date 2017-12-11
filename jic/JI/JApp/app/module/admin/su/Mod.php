<?php namespace _m\admin\su;

class Mod
{
	protected $_iname;
	protected $_params = [];

	public final function isAdmin()
	{
		return FALSE;
	}

	public function __construct( $iname, $params )
	{
		$this->_iname = $iname;
		$this->_params = $params;
	}

	public function isValid()
	{
		return !empty( $this->_params ) ;
	}

	public function ifActionAllowed( $item_name, $action )
	{
		if( isset( $this->_params['permissions'][ $item_name][ $action ] ) )
		{
			return TRUE == $this->_params['permissions'][ $item_name][ $action ] ;
		}

		return FALSE;
	}

	public function canAdd( $item_name  )
	{
		return $this->ifActionAllowed( $item_name, 'add' );
	}

	public function canDelete( $item_name  )
	{
		return $this->ifActionAllowed( $item_name, 'delete' );
	}

	public function canEdit( $item_name  )
	{
		return $this->ifActionAllowed( $item_name, 'edit' );
	}

	public function canAccess( $item)
	{
		return isset( $this->_params['permissions'][$item] );
	}
}
