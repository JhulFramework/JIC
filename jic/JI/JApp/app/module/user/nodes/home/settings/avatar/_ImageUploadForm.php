<?php namespace _modules\user\nodes\member\user\s\settings\avatar;


abstract class _ImageUploadForm extends \Jhul\Components\Application\Form\Base
{

	protected $_image;

	protected function fieldDefinitions()
	{
		return[];
	}

	public function collect( $data = [] )
	{

		if( !empty($_FILES[ 'inputImage' ] ) )
		{
			$file = $_FILES[ 'inputImage' ];


			if( 0 == $file['error'] )
			{
				return $this->loadImage($file['tmp_name']) ;
			}

			$this->addError( $this->name(), 'Error While Uploading Image' );
		}

		return FALSE;
	}

	private function loadImage( $tmpName )
	{
		$entity = $this->imageEntity( $tmpName );

		if( !$entity->hasError() )
		{
			$this->_image = $entity->image();
		}

		$this->addError( $this->name() , $entity->error() );

		return NULL != $this->_image;
	}

	abstract protected function imageEntity( $image );

	public function error( $key = NULL, $wrap = FALSE )
	{
		return parent::error($this->name());
	}

	public function errors( $key = NULL )
	{
		return parent::errors($this->name());
	}

	public function image()
	{
		return $this->_image;
	}

}
