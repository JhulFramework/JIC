<?php namespace JI\Component;

/* @Author : Manish Dhruw [1D3N717Y12@gmail.com]
+=======================================================================================================================
| @Created : 2017NOV19
+---------------------------------------------------------------------------------------------------------------------*/


abstract class _Class
{
	use \JI\_AccessKey;

	private $_key;

	public function __construct( $key )
	{
		$this->_key = $key;
	}

	public function key()
	{
		return $this->_key ;
	}

	public function module()
	{
		return \Jhul::I()->app()->m('pai') ;
	}

	public function appContext()
	{
		return \Jhul::I()->app()->context('pai@setup') ;
	}

	public function run()
	{
		$formFieldMap = require( JI_PATH.'/required_field/_'.$this->key().'.php');


		$this->appContext()->form()->mfield()->setMap( $formFieldMap );

		if( $this->appContext()->form()->isSubmitted() && $this->appContext()->form()->validate() )
		{
			foreach ( $this->appContext()->form()->submittedData() as $field => $value )
			{
				$this->setConfig( $field, $value );
			}

			\JI::I()->setConfiguredStatus( $this->key() , TRUE );
			\JI::I()->commit();

			header( 'Location: '.\JI::I()->autoBaseURL() );
			exit();

		}

		$this->appContext()->run();

		return \Jhul::I()->app()->response()->send();
	}

	public function setConfig( $key, $value )
	{
		\JI::I()->setConfig( $key, $value );

		return $this ;
	}

}
