<?php namespace _modules\gui\db\resource\content;

class Store extends \Jhul\Components\Database\Store\_Class
{
	public function items()
	{
		return
		[
			'read' =>
			[
				'class'	=> __NAMESPACE__.'\\M',
				'select'	=> '*',
			],

			'write' =>
			[
				'class'	=> '\\_modules\\gui\\nodes\\admin\\Content',
				'select'	=> '*',
			]
		];
	}
}
