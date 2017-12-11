<?php namespace _m\image_admin\models;

class Image extends \Jhul\Components\Database\Store\Data\_Class
{
	public function context()
	{
		return 'read_only';
	}

	public function storeClass()
	{
		return __NAMESPACE__.'\\Store' ;
	}

	public function tableName()
	{
		return 'image';
	}

	public function keyName()
	{
		return 'image_key';
	}

	public function name()
	{
		return $this->read('name');
	}

	public function relativeURL()
	{
		return $this->read('url');
	}

	public function iconRelativeURL()
	{
		return str_replace( $this->name(), $this->name().'_icon', $this->relativeURL() );
	}

	public function url()
	{
		return $this->module()->uploadURL().'/'.$this->read('url');
	}

	public function iconUrl()
	{
		return $this->module()->uploadURL().'/'.$this->iconRelativeURL();
	}



}
