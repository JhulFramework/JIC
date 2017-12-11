<?php namespace _m\webpage\view\element\form\field\edittext\inline ;

class Layout extends \_m\webpage\view\element\form\field\_Field
{
	use \_m\webpage\view\element\_HasAttributes;

	abstract public function name();
	abstract public function label();
	abstract public function wrapperClass();

	public function __construct( $formName = NULL )
	{
		if( !empty($formName) )
		{
			$this->setFormName( $formName );
		}
		else
		{
			$this->setAttribute( 'name', $this->name() );
		}

		$this->initialize();
	}

	public function setFormName( $formName )
	{
		$this->setAttribute('name', $formName.'['.$this->name().']');
	}

	protected function initialize(){}

	public function toString()
	{
		return '<div class="'.$this->wrapperClass().'">'.$this->core().'</div>';
	}

	public function makeLabel()
	{
		if( NULL !== $this->label() )
		{
			return '<label for="'.$this->attribute('id').'" >'.$this->label().'</label>';
		}
	}

	public function resDirPath()
	{
		return __DIR__.'/res' ;
	}

	public function useTemplates()
	{
		return ['body'] ;
	}

	public function useStyles()
	{
		return ['layout'] ;
	}
}
