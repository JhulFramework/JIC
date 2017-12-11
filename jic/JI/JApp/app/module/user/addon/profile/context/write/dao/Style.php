<?php namespace _m\user\addon\profile\context\write\dao;

class Style extends \_m\user\addon\profile\dao\style\_DAO
{
	use \Jhul\Components\Database\DAO\_WriteAccessKey;

	public function context()
	{
		return $this->mContext()->key() ;
	}
}
