<?php namespace _m\user\context\siu_\create_\_view;

class TitleBar extends \_m\webpage\view\layout\titlebar\_Class
{
	public function title()
	{
		return 'लिखें';
	}

	public function backURL()
	{
		return $this->app()->url() ;
	}


}
