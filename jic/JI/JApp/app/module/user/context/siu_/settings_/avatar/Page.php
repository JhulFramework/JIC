<?php namespace _m\user\context\siu\settings\avatar;

class Page extends \Jhul\Core\Application\Page\_Class
{
	use \_m\webpage\view\_HasGenerator;

	public function makeWebPage()
	{


		if( $this->form()->isSubmitted() && $this->form()->verifyToken()  )
		{
			if( $this->form()->save() )
			{
				$this->app()->redirect( $this->app()->user()->url() );
			}
		}

		//$this->generate();
		$this->cookView( [ 'form' => $this->form() ] );
		//return $this->cookLocalFile( 'res/view', [ 'form' => $this->form() ] );
	}
}
