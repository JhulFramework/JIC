<?php namespace _modules\user\nodes\home\settings\avatar;



class Page extends \Jhul\Core\Application\Page\_Class
{

	private function user()
	{
		return $this->getApp()->user();
	}


	public function makeWebPage()
	{

		$form = new Form();


		if( $form->isSubmitted() && $form->verifyToken()  )
		{
			if( $form->save() )
			{
				\app\components\Flasher::I()->S('Avatar Changed');

				$this->app()->redirect( $this->user()->url() );
			}

		}


		return $this->cookLocalFile( 'res/view', [ 'form' => $form ] );
	}
}
