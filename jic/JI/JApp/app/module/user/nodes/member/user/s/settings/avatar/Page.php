<?php namespace _modules\user\nodes\member\user\s\settings\avatar;


class Page extends \Jhul\Core\Application\Page\_Class
{

	private function user()
	{
		return $this->getApp()->User();
	}


	public function makeWebPage()
	{

		$form = new Form();

		if( $form->collect() && $form->verifyToken()  )
		{
			$this->user()->avatar()->changeTo( $form->image()->source() );

			\app\components\Flasher::I()->S('Avatar Changed');

			$this->getApp()->redirect( $this->user()->url() );

		}


		return $this->cook( 'avatar_upload', [ 'form' => $form ] );
	}
}
