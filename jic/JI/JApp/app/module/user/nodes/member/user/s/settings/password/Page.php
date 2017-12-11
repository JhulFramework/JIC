<?php namespace _modules\user\nodes\member\user\s\settings\password;


class Page extends \Jhul\Core\Application\Page\_Class
{

	protected function breadcrumb()
	{
		return
		[
			'label' 	=> 'Password',
			'URL'		=> '',
		];
	}

	protected function user() { return $this->getApp()->user(); }

	public function makeWebPage()
	{
		$form = new Form( $this->module()->mUser()->findByKey(   $this->user()->key(), 'write' ) );

		if( $form->collect() && $form->verifyToken() && $form->save() )
		{
			$this->getApp()->setFlash('<div class="success" >Password Has Been Changed</div>');

			$this->getApp()->redirect(  $this->user()->url() );
		}

		return $this->cook( 'user_settings_password', [ 'form' => $form ] );
	}
}
