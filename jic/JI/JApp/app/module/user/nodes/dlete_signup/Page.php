<?php namespace _modules\user\nodes\signup;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage()
	{

		$form = new Form( new \_modules\user\models\anon\User ) ;

		if( $form->isSubmitted() && $form->verifyToken() && $form->validate()  )
		{
			if( $form->save()  )
			{
				if( $this->app()->mDataType('signup_email')->ifVerificationRequired() )
				{
					return $this->app()->redirect( $this->app()->url( 'account_verification/'.$form->email ) );
				}
				else
				{
					$user = $form->entity()->persist();

					$login_user = \_modules\user\nodes\login\M::D()->byKey( $user->key() )->fetch();

					$this->app()->user()->login( $login_user );

					return $this->app()->redirect( $this->app()->url() ) ;
				}
			}
		}

		$this->title = 'SIGN UP';

		$this->indexing = TRUE;

		if( !$this->app()->m('webpage')->has( $form->name() ) )
		{
			$this->app()->m('webpage')->makeAndCache( 'form', new View($form) );
		}

		$this->cook(  'webpage.'.$form->name() , [ 'form' => $form ] );

	}


	public function makeJSON()
	{
		$form = new Form( new \_modules\user\models\anon\User ) ;

		if( $form->isSubmitted() )
		{
			 if( $form->save() )
			 {
				 $this->cook( 'if_signup_success', TRUE );

				 $user = $form->entity()->persist();

				 $login_user = \_modules\user\nodes\login\M::D()->byKey( $user->key() )->fetch();
			 }
			 else
			 {
				 $this->cook( 'name_error', $form->error('name')  );
				 $this->cook( 'email_error', $form->error('signup_email')  );
				 $this->cook( 'password_error', $form->error('password')  );
			 }
		}

	}

}
