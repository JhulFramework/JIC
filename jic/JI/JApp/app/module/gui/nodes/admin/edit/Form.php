<?php namespace _modules\gui\nodes\admin\edit;

class Form extends \Jhul\Components\Form\Edit_Each
{

	public function fields()
	{
		return
		[
			'name', 'description',	'style', 'script',
		];
	}

	public function name()
	{
		return 'item_edit';
	}

	public function saveHandlers()
	{
		return
		[
			'name'		=> 'saveName',
			'description'	=> 'saveDescription',
			'style'		=> 'saveStyle',
			'script'		=> 'saveScript',
		];
	}

	public function restore( $field )
	{
		return $this->entity()->$field();
	}

	public function getValue( $field )
	{
		return $this->entity()->$field();
	}

	public function saveName( $value )
	{
		$this->entity()->write('name', $name )->commit();
	}

	public function saveDescription()
	{
		$this->entity()->write('description', $this->description->value() )->commit();
	}

	public function saveStyle()
	{
		$this->entity()->setStyle( $this->style->value() );
	}

	public function saveScript()
	{
		$this->entity()->setScript( $this->script->value() );
	}

	public function viewName()
	{
		if( isset( $_GET['field'] ) )
		{
			if( $this->mField()->has( $_GET['field'] ) )
			{
				return $this->mField()->get( $_GET['field'], 'type' );
			}
		}

		return 'index';
	}
}
