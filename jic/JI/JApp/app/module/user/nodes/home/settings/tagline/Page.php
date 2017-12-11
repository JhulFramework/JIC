<?php namespace _modules\user\nodes\home\settings\tagline;


class Page extends \Jhul\Core\Application\Page\_Class
{
	private function user()
	{
		return $this->getApp()->user();
	}

	public function makeWebPage()
	{
		$form = new Form(  $this->module()->mUser()->findByKey(  $this->user()->key(), 'write' ) );

		if( $form->isSubmitted()  )
		{
			if( $form->save() )
			{
				$this->getApp()->setFlash('You Have Changed Your Tagline');
				$this->getApp()->redirect( $this->app()->url() );
			}
		}

		return $this->cook( 'user_settings_tagline', [ 'form' => $form ] );
	}
}
