<?php namespace _m\user\context\anon\signup\_view;


class Layout extends \_m\webpage\view\layout\_Class
{

	public function __construct( $params = [] )
	{
		$this->params['loginURL'] = $this->app()->url().'/login';
		$this->params['recoveryURL'] = $this->app()->url().'/recovery';

		parent::__construct( $params );
	}

	public function resourcePath()
	{
		return __DIR__.'/res' ;
	}

	public function useTemplates()
	{
		return [ '_layout' ]  ;
	}

	public function useScripts()
	{
		return [] ;
	}

	public function useStyles()
	{
		return [ 'style' ]  ;
	}

}
