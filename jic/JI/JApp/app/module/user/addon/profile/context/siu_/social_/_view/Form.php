<?php namespace _m\user\addon\profile\context\siu_\social_\_view;

class Form extends \_m\webpage\view\element\form\Form
{
	public function fields()
	{
		return
		[
			'website' 		=> 'editText',
			'github' 		=> 'editText',
			'youtube'		=> 'editText',
			'reddit'		=> 'editText',
			'twitter' 		=> 'editText',
			'instagram' 	=> 'editText',
			'pinterest' 	=> 'editText',
			'gplus' 		=> 'editText',
			'facebook' 		=> 'editText',
		];
	}
}
