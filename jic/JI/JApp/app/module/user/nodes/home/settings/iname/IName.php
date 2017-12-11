<?php namespace _modules\user\activities\_self\settings\iname ;

class IName extends \Jhul\Components\Application\Activity
{

	//TODO confirm box for iname change
	public function run()
	{
	
		$form = new IName_EditForm( $this->com('User')->c() ) ;

		if( $form->collect() && $form->CSRFCheck() && $form->validate())
		{
	
	
		}

		echo __FILE__ ;
		echo "<pre>".__LINE__.'</br>';
		var_dump( $form->errors() );
		echo "</pre>";
		

		return $this->render( 'iname_edit_form', ['form' => $form ]);
	}
}
