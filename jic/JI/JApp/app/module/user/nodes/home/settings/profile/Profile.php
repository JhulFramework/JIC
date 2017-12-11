<?php namespace _modules\user\activities\_self\settings\profile ;

class Profile extends \Jhul\Components\Application\Activity
{

	

	public function run()
	{
		$form  = new ProfileEditForm( $this->com('User')->c()->profile() );
		
		if( $form->collect() && $this->com('AntiCSRF')->validate() )
		{
			if( $form->save() ) $this->redirect( $this->com('User')->c()->url() );
		}

		return $this->render( 'profile_settings', [ 'form' => $form ] );
	}
}
