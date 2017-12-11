<?php namespace _m\main\context\error404_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{
		$this->statusCode = 404;

		$this->title = 'PAGE NOT FOUND';

		$this->cook( 'error404' );
	}

	public function makeJSON()
	{
		$this->cook( 'message', 'invalid_request' );
	}
}
