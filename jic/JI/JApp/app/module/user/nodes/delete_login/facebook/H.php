<?php namespace _modules\auth\nodes\login;

class Handler_Facebook extends \Jhul\Core\Application\Node\Handler
{

	public function run()
	{

		echo __LINE__.'---'.__FILE__.'<pre>';
		var_dump('dmp');
		echo '</pre>';
		exit;
		$form = new XLogin_Form( 'facebook' );

		//If user already in database wwe directly login
		if( NULL != $form->user() )
		{
			$this->getApp()->user()->login( $form->user() );

			$this->redirect( $form->user()->url() );

			return;
		}

		if( $form->isValid() )
		{
			if( $form->collect() && $form->validate() )
			{
				if($form->save())
				{
					$this->getApp()->user()->login( $form->user() );
					$this->redirect( $form->user()->url() );
				}
			}

			return $this->render('auth_xlogin_form', ['form'=>$form]);
		}

		echo __LINE__.'---'.__FILE__.'<pre>';
		var_dump( $form->isValid() );
		echo '</pre>';
		exit;

		//$this->redirect( $this->conf()->get('siteUrl') );
	}
}
