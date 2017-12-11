<?php namespace _modules\auth\activities\login;

class Login_Google_Activity extends \app\common\models\classes\Activity
{

	use \Jhul\Core\Traits\DependencyProvider;

	public function run()
	{

		$form = new Login_X_Form( 'google' );


		//If user already in database wwe directly login
		if( NULL != $form->user() )
		{
			$this->com('User')->login( $form->user() );

			$this->redirect( $form->user()->url() );

			return;
		}

		if( $form->isValid() )
		{
			if( $form->collect() && $form->validate() )
			{
				if($form->save())
				{
					$this->com('User')->login( $form->user() );
					$this->redirect( $form->user()->url() );
				}
			}

			return $this->render('login_x', ['form'=>$form]);
		}

		//$this->redirect( $this->conf()->get('siteUrl') );
	}
}
