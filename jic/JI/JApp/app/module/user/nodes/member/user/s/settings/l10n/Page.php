<?php namespace _modules\user\nodes\member\user\s\settings\l10n;

class Page extends \Jhul\Core\Application\Page\_Class
{


	protected function user() { return $this->getApp()->user(); }

	public function makeWebPage()
	{
		$form = new Form( $this->module()->mUser()->findByKey( $this->user()->key(), 'write' ) );

		if( $form->collect() && $form->save() )
		{
			\app\components\Flasher::I()->S('Language Has Been Changed');

			$this->getApp()->redirect(  $this->user()->url() );
		}

		return $this->cook( 'user_settings_l10n', [ 'form' => $form ] );
	}
}
