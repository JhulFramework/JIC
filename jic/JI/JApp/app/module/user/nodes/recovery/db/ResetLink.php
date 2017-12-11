<?php namespace _modules\user\nodes\recovery\db;

class ResetLink extends \Jhul\Components\Database\Store\Data\_Class
{

	use \Jhul\Components\Database\Store\Data\_WriteAccessKey;

	private $_user;

	public function keyName() { return 'user_key'; }

	public function context() { return 'write'; }

	public function tableName() { return 'user_account_recovery'; }

	public function storeClass()
	{
		return __NAMESPACE__.'\\Store';
	}

	public function userKey()
	{
		return $this->read('user_key') ;
	}

	public function user()
	{
		if(empty($this->_user))
		{
			$this->_user = $this->module()->mUser()->findByKey( $this->userKey(), 'write' );
		}

		return $this->_user;
	}


	public function token()
	{
		return $this->read('token');
	}

	public function link()
	{
		return $this->getApp()->url().'/recovery/verify?k='.$this->userKey().'&t='.$this->token();
	}

	public function isValid() { return $this->ifAttemptsAllowed() && $this->ifTimeValid(); }

	public function ifAttemptsAllowed()
	{
		return $this->read('count_attempts') < $this->module()->config('max_recovery_attempts') ;
	}

	public function ifTimeValid()
	{
		return ( time() - $this->read('created')) < $this->module()->config('recovery_link_lifespan') ;
	}

	public function match(  $token )
	{
		$this->write( 'count_attempts', $this->read('count_attempts') + 1 )->commit();
		return 0 === strcmp( $this->token(), $token );
	}

}
