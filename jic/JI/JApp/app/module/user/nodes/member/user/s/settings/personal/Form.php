<?php namespace _modules\user\nodes\member\user\s\settings\personal;


class Form extends \Jhul\Components\Form\EditDBEntity
{


	public function name()
	{
		return 'personal_settings';
	}

	public function fields()
	{
		return
		[
			'name' => 'name',
			'gender' => 'string',
		] ;
	}

	public function postValidate()
	{
		if( 'male' != $this->gender && 'female' == $this->gender  )
		{
			$this->gender == 'male';
		}
	}

	public function save()
	{
		if( $this->validate() )
		{

			$this->user()->write('name', $this->name->value() );


			$this->user()->write('gender', $this->gender->value() );

			$this->user()->commit();

			$this->getApp()->user()->setState( 'name', $this->user()->name() );

			$this->getApp()->user()->setState( 'gender', $this->user()->gender() );

			return TRUE ;
		}

	}


	public function stringKeys()
	{
		return
		[
			'Name', 'Gender', 'Male', 'Female', 'Save'
		];
	}

	public function user(){ return $this->entity(); }
}
