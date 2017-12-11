<?php namespace _modules\user\nodes\member\user\s\settings\personal;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function user()
	{
		return $this->getApp()->user();
	}

	public function makeWebPage()
	{
		$form = new Form( $this->module()->mUser()->findByKey(  $this->user()->key(), 'write' ) );

		if( $form->collect() )
		{
			if( $form->save() )
			{
				$this->getApp()->setflash('You Have Changed Your Personal Information');
				$this->getApp()->redirect( $this->user()->url() );
			}


		}


		return $this->cook( 'user_settings_personal', [ 'form' => $form ] );
	}
}
