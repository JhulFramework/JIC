<?php namespace _modules\image_admin\nodes\manage;

class Image extends \_modules\image_admin\models\Image
{
	use \Jhul\Components\Database\Store\Data\_WriteAccessKey;

	public function context(){ return 'write'; }
}
