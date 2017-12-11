<?php namespace _m\user\dao\newuser;

abstract class _DAO extends \Jhul\Components\Database\DAO\_Class
{
	public function email() { return $this->read('email'); }

	public function keyName() { return 'identity_key'; }

	public function tableName() { return 'user_unverified'; }

	public function managerClass()
	{
		return __NAMESPACE__.'\\Manager';
	}

	public function verifyCode( $code )
	{
		if( $this->read('verification_code') == $code )
		{
			return TRUE;
		}

		$this->write( 'auth_attempts', $this->read('auth_attempts') + 1 )->commit() ;

	}

	public function incVerificationMailSent()
	{
		$this->write( 'verification_mail_sent', $this->read('verification_mail_sent') + 1 )->commit() ;
	}

	public function ifverificationMailSent()
	{
		return $this->read('verification_mail_sent') > 0 ;
	}

	public function persist()
	{
		$user = $this->module()->userStore()->create
		( 'write',
		[
			'email'	=> $this->read('email'),
			'password'	=> 'placeholder', //since password cannot be null
			'name'	=> $this->read('name'),
		]) ;

		$user->_write( 'password', $this->read('password') );

		$user->commit();

		$d_users = static::D()->byEmail(  $this->read('email') )->fetchAll() ;

		foreach ( $d_users as $du )
		{
			$du->delete();
		}

		return $user;
	}

	//if expired
	public function ifVerificationTimeExpired()
	{
		return (time() - $this->read('created')) > $this->module()->accountVerificationTimeLimit ;
	}

	public function ifVerificationAttemptLimitReached()
	{
		return $this->read('auth_attempts') > $this->getApp()->mDataType('signup_email')->verificationAttemptLimit();
	}
}
