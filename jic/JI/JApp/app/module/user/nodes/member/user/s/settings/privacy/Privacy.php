<?php namespace _modules\user\activities\_self\settings\privacy ;

class Privacy extends \Jhul\Components\Application\Activity
{
	public function run()
	{
		return $this->render( 'privacy_settings');
	}
}
