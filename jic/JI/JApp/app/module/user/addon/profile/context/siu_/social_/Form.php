<?php namespace _m\user\addon\profile\context\siu_\social_;

class Form extends \Jhul\Components\Form\EditDBEntity
{


	public function fields()
	{
		return $this->item()->fields();
	}

	public function name()
	{
		return 'editSocilaLink' ;
	}

	public function save()
	{
		if ( $this->validate() )
		{
			foreach ( $this->fields()  as $field)
			{
				$this->context()->item()->write( $field, $this->$field->value() );
			}

			$this->context()->item()->commit();
			return TRUE ;
		}

		return FALSE ;
	}
}
