<?php namespace _modules\user\activities\_self\settings\iname ;

//RESPONSIBILITIES
// -Valiadte new iName type
// -Check if it is unique

class IName_EditForm extends \Jhul\Components\Application\Html\Form\Entity
{

	use \Jhul\Components\Application\Traits\AccessModule;

	protected function entityClass()
	{
		return '_modules\\user\\models\\entities\\IName';
	}
/*
	public function fieldDefinitions()
	{
		return [

			'iName' => [ 'type'=>'iname', 'length' => '3-15' ]
		];
	}

	private function ifINameAvailable()
	{
		$user = $this->module()->userTable()->byIName( $this->iName )->fetch();
		
		if( NULL == $user )
		{
			return TRUE;
		}
	
		$this->addError('iName', 'Not Available');
		
		return FALSE;
	}


	public function fieldsToSave()
	{
		return [ 'iName' ];
	}
*/
	public function validate()
	{
		return parent::validate() && $this->entity()->isUnique() ;
	}

	public function save()
	{
		if( $this->validate() )
		{
			return $this->saveEntity( FALSE );
		}
	
		return FALSE;
	}
}
