<?php namespace _modules\user\perspectives\s\models\user;

class _Editor extends \Jhul\Components\Database\Design\Data\Editor
{
	public function beforeCreate()
	{
		$this->write('iName', $this->module()->iName()->generateNew() );
	}
}
