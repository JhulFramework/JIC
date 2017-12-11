<?php namespace _modules\user\models\member\s;


class Write extends ReadOnly
{
	use \Jhul\Components\Database\Store\Data\_WriteAccessKey;

	public function context(){ return 'write' ; }
}
