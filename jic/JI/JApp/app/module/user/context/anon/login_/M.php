<?php namespace _m\user\context\anon\login_;



class M extends \Jhul\Components\Database\DAO\_Class
{
	public function tableName() { return 'user' ; }

	public function keyName() { return 'identity_key'; }

	public function matchPassword( $password )
	{
		return $this->app()->mDataType('password')->verifyHash( $password, $this->read('password') );
		//return $this->manager()->matchPassword( $password, $this->read('password') );
	}

	public function loginStates()
	{
		return
		[
			 'name', 'iname', 'avatar', 'l10n', 'url', 'context', 'gender', 'tagline'
		];
	}

	public function gender(){ return $this->read('gender'); }
	public function avatar() { return $this->app()->mDataType('avatar')->url($this->read('avatar')) ; }
	public function name() { return $this->read('name'); }
	public function l10n() { return $this->read('l10n'); }
	public function iname() { return $this->read('iname'); }
	public function tagline() { return $this->read('tagline'); }

	public function url()
	{
		return $this->app()->url().'/@'.$this->iname();
	}

}
