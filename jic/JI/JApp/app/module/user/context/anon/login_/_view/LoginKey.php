<?php namespace _m\user\context\anon\login\_view;


class LoginKey extends \_m\webpage\view\element\form\field\EditText
{

	public function label()
	{
		return '<i class="icon-user"></i> ईमेल' ;
	}

	public function name()
	{
		return 'login_key' ;
	}

	public function id()
	{
		return  'login_key';
	}
}
