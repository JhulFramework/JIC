<?php namespace _modules\user\activities\_self\settings\email ;

class Activity_Edit_Email extends \_modules\user\activities\Activity
{

	public function run()
	{

		$user = $this->com('User')->c(TRUE);



		$this->render('show_primary_email', [ 'user' => $user ] );

		if( $user->P('E')->secondary() != NULL )
		{
			return $this->formSecondaryEmail( $user );
		}

		if( $user->P('E')->unverified() != NULL )
		{
			return $this->formVerifyEmail( $user );
		}

		return $this->formAddEmail( $user );
	}

	private function formAddEmail( $user )
	{
		$form = new Form_Add_Email( $user );

		if(  $form->collect() && $form->csrfCheck() && $form->validate() )
		{

		}

		return $this->render( 'add_secondary_email', ['form'=>$form] );
	}

	private function formVerifyEmail( $user )
	{
		$form = new Form_Verify_Email( $user );
		return $this->render( 'show_unverified_secondary_email', [ 'form' => $form ] );
	}

	private function formSecondaryEmail( $user )
	{
		$form = new Form_Secondary_Email( $user );
		return $this->render( 'show_secondary_email', [ 'form' => $form ] );
	}
}
