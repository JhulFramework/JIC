<?php namespace _modules\user\nodes\anon\signup;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage()
	{

		$form = new Form( new \_modules\user\models\anon\User ) ;

		if( $form->collect() && $form->verifyToken() && $form->validate()  )
		{
			if( $form->save()  )
			{
				if( $this->getApp()->mDataType('signup_email')->ifVerificationRequired() )
				{
					return $this->getApp()->redirect( $this->getApp()->url( 'account_verification/'.$form->email ) );
				}
				else
				{
					$user = $form->entity()->persist();

					$this->getApp()->client()->login( $user );

					return $this->getApp()->redirect('home') ;

				}
			}
		}

		$this->title = 'SIGN UP';
		$this->indexing = TRUE;

		return $this->cook( 'signup', [ 'form' => $form ] );
	}


	public function makeJSON()
	{
		$form = Form::I() ;


		if( $form->collect() )
		{
			 $form->save();
		}

		$this->addJData( 'signup', $form->JSONResponse()  );
	}

}
