<?php namespace _m\admin\_class\index;

abstract class _Page extends \Jhul\Core\Application\Page\Item\_Index
{


	public function editPage()
	{
		$pageClass = $this->J()->fx()->getFromNameSpace(  'edit\\Page', get_called_class() ) ;

		return $pageClass::I();
	}

	// public function makeWebPage()
	// {
	// 	$page_add_form = $this->itemAddForm();
	//
	// 	$page_delete_form =  $this->itemDeleteForm();
	//
	// 	$this->module()->cook( 'admin.items', [ 'items' => $this->items(), 'item_add_form' => $page_add_form, 'item_delete_form' => $page_delete_form ] );
	// }

	public function itemDispenser()
	{
		return $this->context()->itemDispenser();
	}



	public function itemDeleteForm()
	{

		if( empty( $this->_itemAddForm ) )
		{
			$formClass = $this->J()->fx()->getFromNameSpace(  'itemDeleteForm', get_called_class() ) ;
			$this->_itemDeleteForm = new $formClass;

			if( $this->_itemDeleteForm->isSubmitted() )
			{
				if( $this->_itemDeleteForm->process() )
				{

				}
			}
		}

		return $this->_itemAddForm;
	}

}
