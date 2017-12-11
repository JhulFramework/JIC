<?php namespace _m\user\context\siu_\index_\_view;

class Generator extends \_m\webpage\view\_Generator
{

	public function generate( $page )
	{
		$layout =  new Layout();

		$layout->prependTemplate( __DIR__.'/userTitleBar' );

		return $this->builder()->generate( $layout );
	}
}
