<?php namespace _m\admin;

class Admin extends \Jhul\Core\Application\Module\_Class
{

	protected $_form_builder;

	public function formBuilder()
	{
		if( empty($this->_form_builder) )
		{
			$this->_form_builder = new component\form_builder\FormBuilder;
		}

		return $this->_form_builder;
	}

	protected $_su ;
	//returns suber user if logged in
	public function su()
	{
		if( NULL == $this->_su  )
		{
			$iname = $this->getApp()->su()->iname();

			$params = $this->getSUData( $iname );

			if( isset($params['is_admin']) && TRUE == $params['is_admin'] )
			{
				$this->_su = new su\Admin( $this->getApp()->su()->iname() );
			}
			else
			{
				$this->_su = new su\Mod( $this->getApp()->su()->iname(), $this->getSUData( $this->getApp()->su()->iname() ) );
			}
		}

		return $this->_su;
	}

	public function getSUData( $iname )
	{
		$super_users = $this->config('super_users');

		if( isset( $super_users[$iname] ) ) return $super_users[$iname];
	}

	public function getSUPassword( $iname )
	{
		$super_users = $this->config('super_users');

		if( isset( $super_users[$iname] ) ) return $super_users[$iname]['password'];
	}

	public function hasSU( $iname )
	{
		$super_users = $this->config('super_users');

		return isset( $super_users[$iname] );
	}

	public function url( $item = NULL )
	{
		if( !empty($item) )
		{
			return $this->url().'/'.$item;
		}

		return $this->app()->url().'/admin';
	}
}
