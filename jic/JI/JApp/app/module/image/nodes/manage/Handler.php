<?php namespace _modules\image_admin\nodes\manage;

class Handler extends \Jhul\Core\Application\Handler\_Class
{
	public function handle()
	{
		
		$delete_form = new ImageDeleteForm;

		if( $delete_form->collect() )
		{
			$delete_form->deleteImage();

			$this->getApp()->response()->page()->mJS()->embed( 'UIkit.notification(\'Image "'.$delete_form->name->value().'" \', primary);' );
		}


		$upload_form = new Form;

		if( $upload_form->collect() )
		{
			$upload_form->show();

			if( $upload_form->save() )
			{
				$this->getApp()->response()->page()->mJS()->embed( 'UIkit.notification(\'Image Uploaded\', primary);' );
			}
		}

		$images = Image::I()->D()->fetchAll();

		$this->getApp()->response()->page()->cook('index', ['images' => $images, 'upload_form' =>  $upload_form, 'delete_form' => $delete_form ] );
	}
}
