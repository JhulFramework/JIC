<?php namespace _modules\user\perspectives\s\nodes\settings\background ;

class BackgroundSettings extends \Jhul\Core\Application\Node\Handler
{

	protected function breadcrumbData()
	{
		return
		[
			'label'	=> 'Background',
			'URL'		=> '',
		];
	}

	protected function user()
	{
		return $this->getApp()->user()->c();
	}

	protected function run()
	{

		if( !$this->isEnd() ) return FALSE;

		$form = new BackgroundSettings_Form;

		if( $form->CSRFCheck() && $form->collect() )
		{
			$this->user()->background()->changeTo( $form->image()->source() );
			\app\components\Flasher::I()->S('Background Changed');
			$this->getApp()->redirect( $this->user()->background()->url() );
		}

		return $this->render( 'user_image_upload_form', [ 'form' => $form ] );
	}

}
