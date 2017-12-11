<?php namespace _modules\gui\db\resource;

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
				'class'	=> '\\_modules\\gui\\nodes\\admin\\Item',
				'select'	=> '*',
			]
		];
	}

	public function createContent( $item, $content )
	{
		$content['gui_key'] = $item->key();
		return content\Store::I()->createAndCommit( $item->context(), $content );
	}

}
