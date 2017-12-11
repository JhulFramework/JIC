<?php namespace _m\user\addon\profile\context\siu_\social_;

class SocialLink extends \_m\user\addon\profile\dao\social\_SocialLink
{
	use \Jhul\Components\Database\DAO\_WriteAccessKey;

	// public function editFields()
	// {
	// 	return
	// 	[
	// 		'github'		=> 'github',
	// 		'instagaram' 	=> 'instagram',
	// 		'youtube'		=> 'youtube',
	// 		'reddit'		=> 'reddit',
	// 		'facebook'		=> 'facebook',
	// 	];
	// }

	// public function editUrl( $field = NULL )
	// {
	// 	if( $field )
	// 	{
	// 		return $this->editURL().'&field='.$field ;
	// 	}
	//
	// 	return $this->app()->url().'/settings/?a=profile&type=social' ;
	// }

	// public function editFiles()
	// {
	// 	return [] ;
	// }
}
