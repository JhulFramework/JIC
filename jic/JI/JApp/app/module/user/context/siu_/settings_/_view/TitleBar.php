<?php namespace _m\user\context\siu\settings\_view;

class TitleBar extends \_m\webpage\view\layout\titlebar\_Class
{
	public function title()
	{
		return 'व्यवस्था' ;
	}

	public function backUrl()
	{
		return $this->app()->url() ;
	}
}
