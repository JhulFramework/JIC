<?php namespace _modules\user\nodes\recovery\layout;


class Email extends \_m\webpage\sys\element\form\field\EditText
{
	public function name()
	{
		return 'email' ;
	}

	public function label()
	{
		return '<b>@</b> ईमेल' ;
	}
}
