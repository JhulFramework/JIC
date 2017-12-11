<?php namespace _modules\user;

class Module extends \Jhul\Core\Application\Module\_Class
{

	// public function getKitaab( $user )
	// {
	// 	return $this->getApp()->m('syahi')->getKitaabByAuthor( $user );
	// }

	public function aProfile()
	{
		return $this->addOn('profile') ;
	}

	public function getSyahiModule()
	{
		return $this->getApp()->m('syahi');
	}

	public function accessLevelWorld()
	{
		return $this->J()->cx('AL')->get('WORLD');
	}

	public function userAvatarDir()
	{
		return $this->dirNamespace().'/'.$this->config('user_avatar_directory');
	}


	public function security()
	{
		return $this->J()->cx('security');
	}

	//user unverified Email DB
	public function UDB()
	{
		return models\unverified\F::I() ;
	}

	// This will be the class For logged in user
	// so it must have suffeicient previlages
	public function user( $ik )
	{
		return  \_modules\user\perspectives\s\models\user\M::I()->store()->byIK( $ik )->fetch();
	}

	protected $_db_manager;

	public function mDB()
	{
		if( empty($this->_db_manager) )
		{
			$this->_db_manager =  \_m\user\dao\user\Manager::I();
		}

		return $this->_db_manager;
	}

	public function userStore()
	{
		return models\member\Store::I();
	}

	protected $_mUser;

	public function mUser()
	{
		if( empty($this->_mUser) )
		{
			$this->_mUser =  \_modules\user\models\member\Manager::I();
		}

		return $this->_mUser;
	}

}
