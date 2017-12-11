<?php namespace _modules\user\nodes\member\user\s\settings\avatar;


class Form extends \Jhul\Components\Form\_Class
{
	public function name()
	{
		return 'avatar';
	}

	public function fields()
	{
		return
		[
			'avatar_image' => 'image',
		];
	}

	protected function stringKeys()
	{
		return
		[
			'Select Image', 'Upload', 'Avatar Changed Successfully',
		];
	}
}
