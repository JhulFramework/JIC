<?php namespace _modules\user\models\member\user;


class AsVisitor extends \_modules\user\models\member\_Class
{
	public function context(){ return 's' ; }

	protected $_level;


	public function eavMap()
	{
		return
		[
			'iname'		=> __NAMESPACE__.'\\eav\\IName',
			'avatar'		=> __NAMESPACE__.'\\eav\\Avatar',
			//'password'		=> __NAMESPACE__.'\\eav\\Password',
			'background'	=> __NAMESPACE__.'\\eav\\Background',
		];
	}

	public function password()
	{
		return $this->read('password');
	}

	public function background()
	{
		return $this->eav('background');
	}

	public function isSuperUser()
	{
		return $this->read('is_superuser') == 1 ;
	}

	//TODO use null object
	public function canModerate( $type )
	{
		if( $this->isSuperUser() )
		{
			$this->_level = new UserLevel( $this->get('ik') );
		}

		if( NULL != $this->_level )
		{
			return $this->_level->canModerate( $type );
		}

		return FALSE;
	}


}
