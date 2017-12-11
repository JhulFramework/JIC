<?php namespace _m\image_admin\models;

class Store extends \Jhul\Components\Database\Store\_Class
{
	public function items()
	{
		return
		[
			'read_only' =>
			[
				'class'	=> __NAMESPACE__.'\\Image',
				'select'	=> '*',

			],

			'write' =>
			[
				'class'	=> '\\_modules\\image_admin\\nodes\\manage\\Image',
				'select'	=> '*',
			],
		];
	}

	public function add( $context, $params )
	{
		$params['created' ] = time() ;

		return $this->createAndCommit( $context, $params );
	}

	public function beforeDelete( $item )
	{
		$image = $this->module()->uploadPath().'/'.$item->relativeURL();

		if( file_exists($image) )
		{
			unlink($image);
		}

		$icon = $this->module()->uploadPath().'/'.$item->iconRelativeURL();

		if( file_exists($icon) )
		{
			unlink($icon);
		}

		return $item;
	}
}
