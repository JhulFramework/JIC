<?php namespace _modules\user\nodes\home\settings\avatar;

class Setting
{

	use \Jhul\Core\_AccessKey;

	protected $_user;

	public function __construct( $user )
	{
		$this->_user = $user;
	}

	public function user()
	{
		return $this->_user;
	}

	public function changeTo( $source_image )
	{
		$this->mAvatar()->remove( $this->user()->read('avatar') );

		$new_avatar = $this->app()->m('image')->upload( $source_image, $this->mAvatar()->uploadDirectory(), $this->mAvatar()->params() );

		$this->user()->write( 'avatar', $new_avatar->pathRelativeToPublicRoot() )->commit();
	}

	public function mAvatar()
	{
		return $this->app()->mDataType('avatar');
	}


}
