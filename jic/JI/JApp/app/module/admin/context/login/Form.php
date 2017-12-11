<?php namespace _m\admin\context\login;

class Form extends \Jhul\Components\Form\_Class
{
	public function name()
	{
		return 'login';
	}

	public function fields()
	{
		return [ 'iname', 'password' ];
	}

	public function login()
	{
		if( $this->validate() )
		{
			$user = new LoginUser( $this->iname->value() );
			if( $user->isValid() )

			{
				if( $user->matchPassword( $this->password->value() ) )
				{
					$this->getApp()->su()->login( $user );
					return TRUE;
				}
			}

		}
	}
}


class LoginUser
{
	use \Jhul\Core\_AccessKey;

	private $_iname = [];

	public function __construct( $iname )
	{
		$this->_iname = $iname;
	}

	public function key()
	{
		return 11;
	}

	public function iname()
	{
		return $this->_iname ;
	}

	public function password()
	{
		return $this->module()->getSUPassword( $this->iname() );
	}

	public function loginStates()
	{
		return [ 'iname' ];
	}

	public function matchPassword( $password )
	{
		if( !empty($password) )
		{
			return $this->password() == $password  ;
		}

		return FALSE;
	}

	public function isValid()
	{
		return $this->module()->hasSU( $this->iname() );
	}
}
