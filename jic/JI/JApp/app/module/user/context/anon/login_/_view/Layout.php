<?php namespace _m\user\context\anon\login\_view;


class Layout extends \_m\webpage\view\layout\_Class
{

	public function __construct( $params = [] )
	{
		$this->params['signupURL'] = $this->app()->url().'/signup';
		$this->params['recoveryURL'] = $this->app()->url().'/recovery';
		parent::__construct(  $params );
	}

	public function resourcePath()
	{
		return __DIR__.'/res' ;
	}

	public function useScripts()
	{
		return [] ;
	}

	public function useTemplates()
	{
		return [ '_layout' ]  ;
	}

	public function useStyles()
	{
		return [ 'style' ]  ;
	}

	public function name()
	{
		return 'login' ;
	}
}
