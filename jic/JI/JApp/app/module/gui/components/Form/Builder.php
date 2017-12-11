<?php namespace Jhul\Components\HTML\Form;

class Builder
{

	use \Jhul\Core\_AccessKey;

	public function renderFile( $file, $params = [] )
	{
		ob_start();

		extract($params, EXTR_OVERWRITE);


		require($file);

		return ob_get_clean();
	}

	public function form( $form )
	{
		return new _Form( $this, $form );
	}

	protected $_types =
	[
		'text' =>  'makeTextField',
		'text_area' =>  'makeTextArea',
		'checkbox' =>  'makeCheckBox',
	];



	public function build( $form )
	{

		$html = '';

		foreach ( $form->mField()->get() as $field_name => $info )
		{
			if( isset( $this->_types[ $info['type'] ] ) )
			{
				$builder = $this->_types[ $info['type'] ];

				$html .= $this->$builder( $field_name, $form );
			}
		}

		return $html;
	}

	public function html()
	{
		return $this->J()->cx('html');
	}


	public function makeField($field_name, $form )
	{
		$builder = $this->_types[ $form->mField()->type( $field_name ) ];

		return $this->wrap( $this->$builder( $field_name, $form ) );
	}

	public function make( $field_name, $form )
	{
		return $this->renderFile( __DIR__.'/templates/'.$form->mField()->type($field_name).'.php', [ 'field_name' => $field_name, 'form' => $form ] );
	}


	public function makeTextField( $field_name, $form )
	{
		return $this->renderFile( __DIR__.'/templates/text.php', [ 'field_name' => $field_name, 'form' => $form ] );
	}

	public function wrap( $fields )
	{
		return $this->renderFile( __DIR__.'/templates/form_shell.php', [ 'fields' => $fields ] );
	}

	public function makeTextArea( $field_name,  $form )
	{
		return $this->renderFile( __DIR__.'/templates/text_area.php', [ 'field_name' => $field_name, 'form' => $form ] );
	}

	public function selectOptions()
	{

	}
}
