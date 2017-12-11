<?php namespace _m\user\context\siu\settings\avatar\_view;

class Layout extends \_m\webpage\view\layout\_Class
{
	public function useTemplates()
	{
		return ['body'] ;
	}

	public function useStyles()
	{
		return ['style'] ;
	}

	public function resourcePath()
	{
		return __DIR__.'/res' ;
	}
}
