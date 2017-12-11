<?php namespace _m\user\addon\profile\dao\social;

class Manager extends \Jhul\Components\Database\Manager\_Class
{
	public function valueDeflaters()
	{
		return
		[
			'website' => 'htmlEncode',
			'github' => 'htmlEncode',
			'youtube' => 'htmlEncode',
			'reddit' => 'htmlEncode',
			'twitter' => 'htmlEncode',
			'instagram' => 'htmlEncode',
			'pinterest' => 'htmlEncode',
			'google' => 'htmlEncode',
			'facebook' => 'htmlEncode',
		];
	}
}
