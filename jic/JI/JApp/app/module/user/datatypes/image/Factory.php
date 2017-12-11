<?php namespace _modules\user\elements\image;

class Factory
{
	public static function I()
	{
		return new static();
	}

	public function make( $source )
	{
		return new Image( $source );
	}

	public function uploader( $source, $uploadPath, $params )
	{
		return new Uploader(  $this->make($source) , $uploadPath, $params );
	}
}
