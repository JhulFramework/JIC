<?php namespace _m\admin\classes;

abstract class _Index extends \Jhul\Core\Application\Page\Item\_Index
{

	abstract public function itemName();

	public function editPage()
	{
		$pageClass = $this->J()->fx()->getFromNameSpace(  'edit\\Page', get_called_class() ) ;

		return $pageClass::I();
	}

	public function makeWebPage()
	{
		$page_add_form = $this->itemAddForm();

		$page_delete_form =  $this->itemDeleteForm();

		$blogs = $this->itemDispenser()->fetchAll();

		$this->module()->cook( 'admin.items', [ 'items' => $blogs, 'item_add_form' => $page_add_form, 'item_delete_form' => $page_delete_form ] );
	}

	public function itemDispenser()
	{
		return $this->context()->itemDispenser();
	}

	public function itemAddForm()
	{
		if( $this->su()->canAdd( $this->itemName() ) )
		{
			$formClass = $this->J()->fx()->getFromNameSpace(  'ItemAddForm', get_called_class() ) ;

			$form = new $formClass;

			if( $form->isSubmitted() )
			{
				$form->show();

				if( $form->process() )
				{
					$form->hide();
				}
			}

			return $form;
		}

	}

	public function itemDeleteForm()
	{
		if( $this->su()->canDelete( $this->itemName() ) )
		{
			$formClass = $this->J()->fx()->getFromNameSpace(  'ItemDeleteForm', get_called_class() ) ;

			$form = new $formClass;

			if( $form->isSubmitted() )
			{
				$form->process();
			}

			return $form;
		}

	}
}
