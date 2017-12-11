<?php namespace _m\user\context\siu_\settings_\tagline;


class Page extends \Jhul\Core\Application\Page\_Class
{
	private function user()
	{
		return $this->app()->user();
	}

	public function makeWebPage()
	{
		$form = new Form();

		if( $form->isSubmitted()  )
		{
			if( $form->save() )
			{
				$this->app()->setFlash('You Have Changed Your Tagline');
				$this->app()->redirect( $this->app()->user()->url() );
			}
		}

		return $this->cook( 'user_settings_tagline', [ 'form' => $form ] );
	}
}
