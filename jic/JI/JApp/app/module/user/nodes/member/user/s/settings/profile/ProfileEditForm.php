<?php namespace _modules\user\activities\_self\settings\profile ;

class ProfileEditForm extends \Jhul\Components\Application\Html\Form\EditDBEntity
{

	protected function fieldsToSave()
	{
		return ['aboutMe', 'wannaBe', 'lifeIs', 'likes', 'dislikes'] ;
	}

	protected function fieldDefinitions()
	{
		return [
		
			'aboutMe' => ['type'=>'string'],
			
			'wannaBe' => ['type'=>'string'],
			
			'lifeIs' => ['type'=>'string'],
			
			'likes' => ['type'=>'string'],
			
			'dislikes' => ['type'=>'string'],
		
		];
	}

	public function save()
	{
		return $this->saveEntity();
	}
}
