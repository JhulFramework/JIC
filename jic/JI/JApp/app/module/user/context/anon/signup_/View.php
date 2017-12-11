<?php namespace _m\user\context\anon\signup;

class View extends \_m\webpage\components\form\_View
{
	protected $_form;

	public function __construct( $form )
	{
		$this->_form = $form;
	}

	public function name()
	{
		return $this->_form->name() ;
	}

	public function form()
	{
		return $this->_form;
	}

	public function title()
	{
		return 'नया खाता बनाए';
	}

	public function buttonLabel()
	{
		return 'आगे बढ़े';
	}
}
