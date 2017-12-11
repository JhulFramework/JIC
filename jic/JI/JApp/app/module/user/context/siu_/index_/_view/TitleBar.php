<?php namespace _m\article\context\siu\index_\_view;

class TitleBar extends \_m\webpage\view\layout\titlebar\_Class
{
	public function title()
	{
		return  'लेख' ;
	}

	public function backURL()
	{
		return $this->app()->url().'/read';
	}

}
