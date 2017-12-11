<?php namespace _m\pai\context\setup_;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	public function makeWebPage()
	{
		$this->generate();
		//$this->cookLocalFile('body' );
		$this->cookView( [ 'form' => $this->context()->form() ] );
	}
}
