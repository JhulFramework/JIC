<?php namespace _m\user\context\siu_\read_\_view;

class TitleBar extends \_m\webpage\view\layout\titlebar\_Class
{
	public function title()
	{
		return 'पढ़े';
	}

	public function backURL()
	{
		return $this->app()->url() ;
	}


}
