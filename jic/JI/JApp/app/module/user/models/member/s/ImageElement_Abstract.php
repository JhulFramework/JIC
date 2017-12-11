<?php namespace _modules\user\perspectives\s\models;

abstract class ImageElement_Abstractsadsad extends \_modules\user\models\ImageElement_Abstract
{

	use \Jhul\Core\Traits\Kernel_Access;


	public function changeTo( $src )
	{
		$this->dispose();

		$uploader = $this->moduleElement()->uploader( $src );

		$this->J()->g('E')->mute('W');

		$this->user()->set( $this->name() , $uploader->sanitize()->setRescaleMode('shrink')->save(), TRUE);

		$this->J()->g('E')->unmute('W');

		$this->user()->save();
	}

	public function dispose()
	{
		$file = $this->moduleElement()->path( $this->value() );

		if( is_file( $file ) )
		{
			@unlink($file);
		}
	}

}
