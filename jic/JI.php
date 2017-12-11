<?php

/* @Author : Manish Dhruw [1D3N717Y12@gmail.com]
+=======================================================================================================================
| @Created : 2017NOV17
+---------------------------------------------------------------------------------------------------------------------*/

defined('JI_SYSTEM_ROOT') or define('JI_SYSTEM_ROOT', __DIR__);

class JI
{
	const REGISTER_KEY = 'ji';

	const CONFIGURED_STATUS_KEY = 'configured_status';

	//Config Object
	private $_config ;

	private $_component_map = [] ;

	private $_configured;

	//Database Object
	private $_db ;

	/*
	| Environment Key
	| @DataType: String
	| Example : dev, main
	*/
	private $_envKey = '';

	private $_ifJhulStarted = FALSE;

	private $_publicRoot ;

	/*
	| Register Manager
	| @DataType : Object
	*/
	private $_mRegister ;

	private static $I = NULL;

	private function __construct( $public_root, $environmentKey )
	{
		$this->_envKey 		= $environmentKey;
		$this->_publicRoot 	= $public_root ;
		$this->_component_map 	= require( __DIR__.'/_components.php' );
	}

	public function componentMap()
	{
		return $this->_component_map ;
	}

	public function envKey()
	{
		return $this->_envKey ;
	}

	public function mReg()
	{
		return $this->_mRegister;
	}

	public function register()
	{
		return $this->mReg()->get(static::REGISTER_KEY) ;
	}

	public function commit()
	{
		return $this->register()->commit() ;
	}


	public function isConfigured( $componentKey )
	{
		return TRUE == $this->register()->get( static::CONFIGURED_STATUS_KEY.'.'.$componentKey, FALSE );
	}

	public static function create( $public_root, $envKey )
	{
		if( NULL == static::$I )
		{
			static::$I = new static( $public_root, $envKey );
			static::$I->_mRegister 	= new \JI\Register\Manager( __DIR__.'/_data/'.static::$I->envKey() );
		}
	}

	public function config( $key = NULL )
	{
		if( !empty($key) )
		{
			if( !strpos($key, '.' ) )
			{
				$key = 'main.'.$key;
			}

			return $this->register()->get( 'config.'.$key );
		}

		return $this->register()->get('config.main');
	}

	public function setConfig( $key, $value )
	{
		if( !strpos($key, '.' ) )
		{
			$key = 'main.'.$key;
		}

		$this->register()->set( 'config.'.$key, $value );

		return $this ;
	}

	public function db()
	{
		return $this->_db ;
	}

	public static function I()
	{
		return static::$I ;
	}

	public function systemRoot()
	{
		return JI_SYSTEM_ROOT ;
	}

	public function publicRoot()
	{
		return $this->_publicRoot ;
	}

	public static function run( $public_root, $envKey )
	{
		static::create($public_root, $envKey);

		foreach ( static::$I->componentMap() as $key => $class)
		{
			if( !static::$I->isConfigured($key) )
			{
				static::$I->startJHUL();

				$component = new $class( $key );
				$component->run();
				exit();
			}
		}
	}

	public function startJHUL()
	{
		if( !$this->_ifJhulStarted )
		{
			require_once( __DIR__.'/JI/JApp/include_me.php' );
			createJApp( $this->publicRoot() );
			$this->_ifJhulStarted = TRUE;
		}
	}

	public function ifJhulStarted()
	{
		return TRUE === $this->_ifJhulStarted ;
	}


	public function setConfiguredStatus( $componentKey, $state )
	{
		$this->register()->set( static::CONFIGURED_STATUS_KEY.'.'.$componentKey, $state);
		return $this ;
	}

	public function store()
	{
		return $this->_store ;
	}

	public function autoBaseURL()
	{
		return trim( $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], '/') ;
	}
}
