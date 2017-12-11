<?php namespace _m\user\context\anon\signup\_view;



class Email extends  \_m\webpage\view\element\form\field\EditText
{
	public function name()
	{
		return 'signup_email' ;
	}

	public function label()
	{
		return '<i class="icon-mail" ></i> ईमेल' ;
	}


}
