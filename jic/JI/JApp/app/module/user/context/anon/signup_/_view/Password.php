<?php namespace _m\user\context\anon\signup\_view;

class Password extends  \_m\webpage\view\element\form\field\EditText
{

	public function name()
	{
		return 'password' ;
	}

	public function label()
	{
		return '<i class="icon-lock"></i> गुप्तशब्द' ;
	}
}
