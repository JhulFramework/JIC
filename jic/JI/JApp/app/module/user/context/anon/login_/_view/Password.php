<?php namespace _m\user\context\anon\login\_view;

class Password extends \_m\webpage\view\element\form\field\EditText
{
	public function label()
	{
		return '<i class="icon-lock-open"></i> गुप्तशब्द' ;
	}

	public function type()
	{
		return  'password';
	}

	public function name()
	{
		return  'password';
	}

	public function id()
	{
		return  'password';
	}
}
