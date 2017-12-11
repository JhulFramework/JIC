<?php namespace _modules\user\nodes\login;


class View extends \_m\webpage\components\form\_View
{
	use \Jhul\Core\_AccessKey;

	protected $_form ;

	public function __construct( $form )
	{
		$this->_form = $form;
	}

	public function form()
	{
		return $this->_form;
	}

	public function name()
	{
		return $this->_form->name();
	}

	public function title()
	{
		return 'Login Form';
	}

	public function buttonLabel()
	{
		return 'Login';
	}

	public function layout()
	{
		return 'login';
	}

	public function params()
	{
		return
		[
			'recovery_url' => $this->app()->url().'/recovery',
			'signup_url' => $this->app()->url().'/signup',
		];
	}
}
