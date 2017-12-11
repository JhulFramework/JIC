<?php namespace _modules\user\models\member;

class Login extends \Jhul\Components\Database\Store\Data\_Class
{
	public function tableName() { return 'user' ; }

	public function keyName() { return 'identity_key'; }

	public function context() { return 'login' ; }

	public function storeClass()
	{
		return '\\_modules\\user\\models\\member\\Store' ;
	}

	public function matchPassword( $password )
	{
		return $this->store()->matchPassword( $password, $this->read('password') );
	}

	public function loginStates()
	{
		return
		[
			 'name', 'iname', 'avatar', 'l10n', 'url', 'context', 'gender', 'tagline'
		];
	}

	public function gender(){ return $this->read('gender'); }
	public function avatar() { return $this->getApp()->mDataType('avatar')->url($this->read('avatar')) ; }
	public function name() { return $this->read('name'); }
	public function l10n() { return $this->read('l10n'); }
	public function iname() { return $this->read('iname'); }
	public function tagline() { return $this->read('tagline'); }

	public function url()
	{
		return $this->getApp()->url().'/@'.$this->iname();
	}

}
