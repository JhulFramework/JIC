<?php namespace _modules\user\nodes\home\settings\avatar;

class Form extends \Jhul\Components\Form\_Class
{
	public function name()
	{
		return 'avatar_upload_form';
	}

	public function files()
	{
		return [ 'avatar' ];
	}

	public function save()
	{
		if( $this->validate() )
		{
			$avatar_setting = new Setting( $this->app()->user()->editor() );

			$avatar_setting->changeTo( $this->avatar );

			$this->app()->user()->setState('avatar', $avatar_setting->user()->avatar()  );

			return TRUE;
		}
	}
}
