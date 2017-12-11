<?php namespace _modules\user\nodes\member\user\s\settings\l10n;


class Form extends \Jhul\Components\Form\EditDBEntity
{

	public function fields()
	{
		return
		[
			'l10n' => 'string',
		];
	}

	public function name()
	{
		return 'l10n_form';
	}

	public function save()
	{
		if( $this->validate() )
		{
			$this->l10n = $this->getApp()->lipi()->get( $this->l10n );

			if( empty($this->l10n))
			{
				$this->l10n = $this->getApp()->lipi()->get('eng');
			}

			$this->entity()->write('l10n', $this->l10n )->commit() ;

			$this->getApp()->user()->setL10N( $this->entity()->l10n() );
			return TRUE;
		}

		return FALSE;
	}

	protected function stringKeys()
	{
		return
		[
			'Language', 'Set Language',
		];
	}

}
