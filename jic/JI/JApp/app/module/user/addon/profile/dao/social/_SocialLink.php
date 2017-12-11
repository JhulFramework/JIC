<?php namespace _m\user\addon\profile\dao\social;

abstract class _SocialLink extends \Jhul\Components\Database\DAO\_Class
{

	public function fields()
	{
		return
		[
			'website', 'github', 'youtube', 'reddit', 'twitter', 'instagram', 'pinterest', 'gplus', 'facebook',
		];
	}

	public function keyName()
	{
		return 'userKey' ;
	}

	public function tableName()
	{
		return 'profile_socialLink' ;
	}

	public function youtube()
	{
		return $this->read('youtube') ;
	}

	public function github()
	{
		return $this->read('github') ;
	}

	public function reddit()
	{
		return $this->read('reddit') ;
	}

	public function facebook()
	{
		return $this->read('youtube') ;
	}

	public function instagram()
	{
		return $this->read('instagram') ;
	}

	public function managerClass()
	{
		return __NAMESPACE__.'\\Manager' ;
	}

}
