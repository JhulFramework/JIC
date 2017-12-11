<?php namespace _modules\gui;

class Module extends \Jhul\Core\Application\Module\_Class
{
	public function adminURL()
	{
		return $this->getApp()->url().'/admin/gui';
	}

	public function url()
	{
		return $this->getApp()->url().'/gui';
	}


	public function styleMaxLength()
	{
		return $this->config( 'style_max_length' );
	}


	public function scriptMaxLength()
	{
		return $this->config( 'script_max_length' );
	}

	public function asArray( $offset = 0 )
	{
		return db\resource\M::D()->fetchAll();
	}

	public function get( $keys )
	{
		return db\resource\M::byKeys( $keys )->fetchAll();
	}

}
