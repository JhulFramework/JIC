<?php namespace _modules\user\elements\image;

abstract class ModuleElementImage extends \Jhul\Components\Application\Module_Element
{
	public function rules()
	{
		return
		[
			'type' => 'image',

			'allowedTypes'	=> [ 'jpg', 'gif', 'png' ],

			'width' => '100-'.$this->g('inputImage')['maxWidth'],

			'height' => '100-'.$this->g('inputImage')['maxHeight'],

			'size' => '100-'.$this->g('inputImage')['maxSize'],
		]
	}


	abstract public function placeHolder();

	public function url( $image = NULL )
      {
		if( !empty( $image )  )
		{
            	return $this->getApp()->publicRootToUrl( $this->path() ).'/'.$image;
		}

		return $this->getApp()->url( $this->placeHolder() );

      }

	////Image extension is dynamic
	public function path( $avatar = NULL )
	{
		if( NULL != $avatar )
		{
			return $this->path().'/'.$avatar;
		}

		return $this->module()->baseUploadPath().'/'.$this->directory() ;
	}

	public function maxWidth()
	{
		return $this->g('maxWidth');
	}

	public function maxHeight()
	{
		return $this->g('maxHeight');
	}
}
