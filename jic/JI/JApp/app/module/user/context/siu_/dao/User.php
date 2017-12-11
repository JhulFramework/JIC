<?php namespace _m\user\context\siu_\dao;

class User extends \_m\user\dao\user\_DAO
{
	private $_profile;

	public function profile()
	{
		if( empty($this->_profile) )
		{
			$this->_profile = $this->module()->aProfile()->get( $this->key() );
		}

		return $this->_profile ;
	}
}
