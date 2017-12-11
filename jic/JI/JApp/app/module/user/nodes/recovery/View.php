<?php namespace _modules\user\nodes\recovery;


class View extends \_m\webpage\components\form\_View
{
	use \Jhul\Core\_AccessKey;

	protected $_form ;

	public function __construct( $form )
	{
		$this->_form = $form;
	}

	public function form()
	{
		return $this->_form;
	}

	public function name()
	{
		return $this->_form->name();
	}

	public function title()
	{
		return 'खाता वापस पाये';
	}

	public function buttonLabel()
	{
		return 'रिकवरी लिंक भेजें';
	}

}
