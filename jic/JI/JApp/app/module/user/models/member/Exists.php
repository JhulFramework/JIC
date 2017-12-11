<?php namespace _modules\user\models\member;


class Exists extends \Jhul\Components\Database\Store\Data\_Class
{
	public function keyName(){ return 'identity_key'; }

	public function tableName(){ return 'user'; }

	public function storeClass()
	{
		return __NAMESPACE__.'\\Store';
	}

	public function context(){ return 'exists' ; }
}
