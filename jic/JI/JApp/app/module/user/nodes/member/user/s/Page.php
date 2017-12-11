<?php namespace _modules\user\nodes\member\user\s;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebpage()
	{
		$this->getApp()->mapper()->registerView( $this->module()->key(), 'profile_self', __DIR__.'/res/view'  );

		$this->title = $this->getApp()->user()->iname();
		return $this->cook
		(
			'profile_s',

			[
				'host' => $this->getApp()->user()->get( 'host' )
				'views' =>
				[

				]
			]
		);
	}

}
