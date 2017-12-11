<?php namespace _modules\user\db\user;

abstract class _Class extends \Jhul\Components\Database\Store\Data\_Class
{
	public function tableName() { return 'user'; }

	public function keyName() { return  'identity_key' ; }

	//TODO save and return user prefeere languafe
	public function l10n() { return $this->read('l10n'); }

	public function storeClass()
	{
		return '\\_modules\\user\\models\\member\\Store' ;
	}

}
