<?php namespace _m\user\context\siu_\settings_\dao;

class User extends \_m\user\dao\user\_DAO
{
	use \Jhul\Components\Database\DAO\_WriteAccessKey;

	public function password()
	{
		return $this->read('password') ;
	}

}
