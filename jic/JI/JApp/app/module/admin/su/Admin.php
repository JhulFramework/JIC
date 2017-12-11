<?php namespace _m\admin\su;

class Admin
{
	protected $_iname;

	public function __construct( $iname )
	{
		$this->_iname = $iname;
	}

	public function canAccess()
	{
		return TRUE;
	}

	public function isAdmin()
	{
		return TRUE;
	}

	public function ifActionAllowed()
	{
		return TRUE;
	}

	public function canEdit( $item_name )
	{
		return TRUE;
	}

	public function canAdd( $item_name )
	{
		return TRUE;
	}

	public function canDelete( $item_name )
	{
		return TRUE;
	}
}
