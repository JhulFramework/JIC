<?php namespace _modules\gui\db\resource\content;

class M extends \Jhul\Components\Database\Store\Data\_Class
{
	public function context()
	{
		return 'read';
	}

	public function keyName()
	{
		return 'gui_key';
	}

	public function tableName()
	{
		return 'gui_content';
	}

	public function storeClass()
	{
		return __NAMESPACE__.'\\Store';
	}


	public function style()
	{
		return $this->read('style');
	}

	public function script()
	{
		return $this->read('script');
	}
}
