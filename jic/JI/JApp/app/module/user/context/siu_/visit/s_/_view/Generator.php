<?php namespace _m\user\context\siu_\visit\s_\_view;

class Generator extends \_m\webpage\view\_Generator
{
	public function generate( $page )
	{
		$layout =  new Layout();

		return $this->builder()->generate( $layout );
	}
}
