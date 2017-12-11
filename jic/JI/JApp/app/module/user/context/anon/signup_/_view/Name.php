<?php namespace _m\user\context\anon\signup\_view;


class Name extends \_m\webpage\view\element\form\field\EditText
{
	public function label()
	{
		return '<i class="icon-user"></i> नाम' ;
	}

	public function name()
	{
		return 'name';
	}
}
