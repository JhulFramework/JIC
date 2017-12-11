<?php namespace _m\user\addon\profile\context\write\dao;

class Data extends \_m\user\addon\profile\dao\data\_DAO
{

	use \Jhul\Components\Database\DAO\_WriteAccessKey;

	public function context()
	{
		return $this->mContext()->key() ;
	}
}
