<?php namespace Jhul\Core\Application\Response\WebPage;

/* @Author : Manish Dhruw < 1D3N717Y12@gmail.com >
+-----------------------------------------------------------------------------------------------------------------------
| @Created : 24-Oct-2016
+---------------------------------------------------------------------------------------------------------------------*/

class Image
{

	use \Jhul\Core\_AccessKey;

	public function url( $name, $ext = 'png')
	{
		return $this->app()->url().'/'. $this->app()->config('public_image_directory').'/'.$name.'.'.$ext ;
	}


	public function link( $name, $ext = 'png', $params = [] )
	{
		return  '<img src="'.$this->url( $name, $ext ).'" />' ;
	}
}
