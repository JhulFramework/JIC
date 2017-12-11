<?php namespace _m\user\context\siu\settings\avatar;

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
			$this->updateAvatar();

			$this->app()->user()->setState('avatar', $this->userEditor()->avatar()  );

			return TRUE;
		}
	}

	private function updateAvatar()
	{

		$this->mAvatar()->remove( $this->userEditor()->read('avatar') );

		$new_avatar = $this->app()->m('image')->upload( $this->avatar, $this->mAvatar()->uploadDir(), $this->mAvatar()->params() );

		$this->userEditor()->write( 'avatar', $new_avatar->pathRelativeToUploadDirectory() )->commit();
	}

	public function mAvatar()
	{
		return $this->app()->mDataType('avatar');
	}

	public function userEditor()
	{
		return $this->context()->user() ;
	}


}
