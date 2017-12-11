<?php namespace _modules\gui\nodes\admin;

class Content extends \_modules\gui\db\resource\content\M
{
	use \Jhul\Components\Database\Store\Data\_WriteAccessKey;

	public function context()
	{
		return 'write' ;
	}
}
