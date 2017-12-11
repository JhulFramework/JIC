<?php namespace _modules\user\activities\_self\settings\email ;

class Form_Add_Email extends \Jhul\Components\Application\Html\Form\Base
{

	use \Jhul\Components\Application\Traits\AccessModule;

	protected function fieldDefinitions()
	{
		return
		[
			'email' => [ 'type'=>'email', ]
		];
	}

	public function validate()
	{
		$email = $this->module()->P('E')->entity($this->email);

		if( $email->validate() )
		{
			return TRUE;
		}

		$this->addError( 'email', $email->error() );

		return FALSE;
	}


	protected function save()
	{
		if( $this->validate() )
		{
			return $this->entity()->email()->add( $this->email ) ;
		}

		return FALSE;
	}

}
