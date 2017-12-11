<?php namespace _m\user\context\siu_\settings_\password;


class Page extends \Jhul\Core\Application\Page\_Class
{
	protected function user() { return $this->getApp()->user(); }

	public function makeWebPage()
	{
		$form = new Form();

		if( $form->isSubmitted() && $form->verifyToken() && $form->save() )
		{
			$this->getApp()->setFlash('<div class="success" >Password Has Been Changed</div>');

			$this->getApp()->redirect(  $this->app()->url() );
		}

		return $this->cook( 'user_settings_password', [ 'form' => $form ] );
	}
}
