<?php namespace _modules\user\perspectives\s\nodes\settings\background ;

class BackgroundSettings_Form extends \_modules\user\perspectives\s\models\ImageUpload_Form
{

	protected function stringKeys()
	{
		return
		[
			'Select Image', 'Upload', 'Background Changed Successfully',
		];
	}


	public function imageEntity( $image )
	{
		return $this->module()->background()->entity( $image );
	}
}
