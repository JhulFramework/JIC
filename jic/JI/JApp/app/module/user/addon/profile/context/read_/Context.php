<?php namespace _m\user\addon\profile\context\read_;

class Context extends \Jhul\Core\Application\Module\Context\_Class
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

			__NAMESPACE__.'\\dao\\Style' => '*',
			__NAMESPACE__.'\\dao\\SocialLink' => '*',
		];
	}
}
