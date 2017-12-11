<?php namespace _modules\user\datatypes\avatar;

class Avatar extends \Jhul\Core\Application\DataType\Types\Image\Attribute
{

	use \Jhul\Core\_AccessKey;

	public function type()
	{
		return 'avatar';
	}

	public function definitionString()
	{
		return $this->p('definition');
	}

	public function allowedTypes()
	{
		return $this->config('allowed_types');
	}

	public function url(  $url = NULL )
	{
		if(empty($url))
		{
			$url = $this->config('place_holder') ;
		}

		return $this->app()->pubResUrl().'/'.$this->uploadDir().'/'.$url;
	}

	// public function uploadPath( $file )
	// {
	// 	return $this->app()->publicRoot().'/'.$this->config( 'upload_directory' );
	// }
	//
	// public function uploadDir()
	// {
	// 	return $this->config( 'upload_directory' );
	// }

	public function remove( $image )
	{
		$image = $this->app()->pubResPath().'/'.$this->uploadDir().'/'.$image;

		if( is_file( $image ) )
		{
			@unlink( $image );
		}
	}

	public function uploadDir()
	{
		return $this->module()->userAvatarDir() ;
	}

	public function params()
	{
		return
		[
			'max_width' 	=>  $this->config('final_width'),
			'max_height' 	=>  $this->config('final_height'),
		];
	}
}
