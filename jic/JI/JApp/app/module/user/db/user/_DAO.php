<?php namespace _m\user\db\user;

abstract class _DAO extends \Jhul\Components\Database\DAO\_Class
{
	public function tableName() { return 'user'; }

	public function keyName() { return  'identity_key' ; }

	//TODO save and return user preferred language
	public function l10n() { return $this->read('l10n'); }

	public function managerClass()
	{
		return __NAMESPACE__.'\\Manager' ;
	}

}
