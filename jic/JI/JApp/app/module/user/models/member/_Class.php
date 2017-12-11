<?php namespace _modules\user\models\member;

abstract class _Class extends \Jhul\Components\Database\Store\Data\_Class
{
	use \Jhul\Core\_AccessKey;
	use \Jhul\Components\Database\Traits\EAV\Entity;
	use _Getters;

	public function tableName() { return 'user'; }

	public function keyName() { return  'identity_key' ; }

	public function isMember() { return TRUE; }

	//TODO save and return user prefeere languafe
	public function l10n() { return $this->read('l10n'); }

	public function storeClass()
	{
		return __NAMESPACE__.'\\Store';
	}


}
