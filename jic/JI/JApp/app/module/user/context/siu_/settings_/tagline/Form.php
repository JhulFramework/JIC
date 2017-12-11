<?php namespace _m\user\context\siu_\settings_\tagline;

class Form extends \Jhul\Components\Form\EditDBEntity
{

	public function fields()
	{
		return [ 'tagline' ] ;
	}

	public function name()
	{
		return 'edit_tagline';
	}

	public function save()
	{
		$this->entity()->write( 'tagline',   $this->html()->encode( mb_substr( $this->tagline, 0, 300)  ) )->commit();
		$this->app()->user()->setState('tagline', $this->entity()->tagline() );
		return TRUE;
	}

	protected function stringKeys()
	{
		return [ 'Tagline', 'Save', ];
	}
}
