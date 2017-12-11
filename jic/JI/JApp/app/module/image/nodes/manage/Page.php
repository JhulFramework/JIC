<?php namespace _modules\image_admin\nodes\manage;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{

		$delete_form = new ImageDeleteForm;

		if( $delete_form->collect() )
		{
			$delete_form->deleteImage();

			$this->getApp()->response()->page()->mJS()->embed( 'UIkit.notification(\'Image "'.$delete_form->name->value().'" DELETED! \', \'danger\');' );
		}


		$upload_form = new Form;

		if( $upload_form->collect() )
		{
			$upload_form->show();

			if( $upload_form->save() )
			{
				$upload_form->hide();
				$this->getApp()->response()->page()->mJS()->embed( 'UIkit.notification(\'Image "'.$upload_form->name.'" Uploaded\', \'primary\');' );
			}
		}

		$images = Image::I()->D()->fetchAll();

		$this->getApp()->response()->page()->cook('index', ['images' => $images, 'upload_form' =>  $upload_form, 'delete_form' => $delete_form ] );
	}
}
