<?php namespace _m\image;

class Module extends \Jhul\Core\Application\Module\_Class
{
	public function uploadPath()
	{
		return $this->getApp()->publicRoot().'/'.$this->uploadDirectory();
	}

	public function uploadURL()
	{
		return $this->getApp()->url().'/'.$this->uploadDirectory();
	}

	public function imageParams( $params = [] )
	{
		return array_merge( $params, $this->config('image') );
	}

	public function iconParams( $params = [] )
	{
		return array_merge( $params, $this->config('icon') );
	}

	public function uploadDirectory()
	{
		return $this->config('upload_directory');
	}


	//returns image object
	public function addImage( $source_image, $params = [] , $caption = '' )
	{
		$new_image = new components\uploader\Uploader( $source_image, $this->uploadDirectory(), $this->imageParams( $params ) );


		if( $new_image->save() )
		{
			$icon_params = $this->iconParams( ['name' => $new_image->name().'_icon' ] );

			$icon = new components\uploader\Uploader( $source_image , $this->uploadDirectory(), $icon_params );

			$icon->save();

			return models\Store::I()->add( 'write', [ 'name' => $new_image->name(), 'url' => $new_image->relativeFilePath() ]  )->key() ;
		}
	}

	public function createNewImage( $source_image, $upload_directory, $params = [] )
	{

		return new components\uploader\Uploader( $source_image, $this->app()->pubResDir().'/'.$upload_directory, $params );
	}

	public function upload( $source_image, $upload_directory, $params = [] )
	{
		$image =  new components\uploader\Uploader( $source_image, $this->app()->pubResDir().'/'.$upload_directory, $params );
		$image->save();
		return $image;
	}

	public function delete( $image_key )
	{

	}

	public function getUrl( $image_key )
	{

	}

	public function uploadDir()
	{
		return $this->config('upload_dir');
	}
}
