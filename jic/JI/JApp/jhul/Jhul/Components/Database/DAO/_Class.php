<?php namespace Jhul\Components\Database\DAO;

abstract class _Class extends _Base
{

	public static function I() { return new static(); }

	//dispenser
	public static function D()
	{
		$item = static::I();
		return $item->getDB()->dispenser( $item );
	}

}
