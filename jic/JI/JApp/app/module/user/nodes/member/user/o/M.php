<?php namespace _modules\user\nodes\member\user\o;


class M extends \Jhul\Components\Database\Store\Data\_Class
{
	public function keyName() { return 'identity_key'; }

	public function tableName() { return 'user'; }

	public function context(){ return 's'; }

	public function storeClass()
	{
		return '\\_modules\\user\\models\\member\\Store';
	}

	public function gender()
	{
		return $this->read('gender') ;
	}

	public function name()
	{
		return $this->read('name') ;
	}

	public function tagline()
	{
		return $this->read('tagline') ;
	}

	public function avatar()
	{
		return $this->getApp()->mDataType('avatar')->url( $this->read('avatar') );
	}
}
