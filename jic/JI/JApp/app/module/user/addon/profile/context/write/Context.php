<?php namespace _m\user\addon\profile\context\write;

class Context extends \Jhul\Core\Aplication\Context
{

	public function isAccessible()
	{
		return TRUE ;
	}

	public function daoMap()
	{
		return
		[
			__NAMESPACE__.'\\dao\\Data'  => '*',

			__NAMESPACE__.'\\dao\\Style'  => '*',
		];
	}
}
