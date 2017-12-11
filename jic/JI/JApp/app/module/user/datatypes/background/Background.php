<?php namespace _modules\user\elements\background;

class Background extends \app\components\image\Image_ModuleElement
{
	public function entity( $backgroundImage )
	{
		return new EntityBackground( $backgroundImage );
	}
}
