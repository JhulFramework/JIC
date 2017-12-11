<?php namespace _modules\user\nodes\member\user\s\settings\tagline;


class Form extends \Jhul\Components\Form\EditDBEntity
{

	public function fields()
	{
		return [ 'tagline' => 'string' ] ;
	}

	public function name()
	{
		return 'edit_tagline';
	}

	public function save()
	{
		$this->entity()->write( 'tagline',   $this->html()->encode( mb_substr( $this->tagline, 0, 300)  ) )->commit();
		$this->getApp()->user()->setState('tagline', $this->entity()->tagline() );
		return TRUE;
	}

	protected function stringKeys()
	{
		return [ 'Tagline', 'Save', ];
	}
}
