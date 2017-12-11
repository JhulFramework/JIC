<?php namespace _modules\user\nodes\recovery\layout;


class Layout extends \_m\webpage\sys\layout\_Class
{

	public function __construct( $name, $params = [] )
	{
		parent::__construct( $name, $params );

		$this->params['loginURL'] = $this->app()->url().'/login';
		$this->params['signupURL'] = $this->app()->url().'/signup';
	}

	public function resourcePath()
	{
		return __DIR__.'/res' ;
	}

	public function useTemplates()
	{
		return [ '_layout' ]  ;
	}

	public function useStyles()
	{
		return [ 'style' ]  ;
	}

	public function useScripts()
	{
		return [] ;
	}

}
