<?php namespace _m\user\addon\profile\context\siu_\_view;

class Generator extends \_m\webpage\view\_Generator
{

	public function generate( $page )
	{

		$layout = new Layout();

		return $this->builder()->generate( $layout );
	}
}
