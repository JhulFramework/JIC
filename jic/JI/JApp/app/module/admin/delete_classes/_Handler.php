<?php namespace _m\admin\classes;

abstract class _Handler extends \Jhul\Core\Application\Handler\_Class
{

	public function isAccessible()
	{
		return $this->su()->canAccess( $this->itemName() );
	}

	abstract public function itemName();

	public function editPage()
	{
		$pageClass = $this->J()->fx()->getFromNameSpace(  'edit\\Page', get_called_class() ) ;

		return $pageClass::I();
	}

	public function handle()
	{
		return isset($_GET['item'] ) ? $this->editPage()->make() : $this->index();
	}

	public function index()
	{
		$page_add_form = $this->itemAddForm();

		$page_delete_form =  $this->itemDeleteForm();

		$blogs = $this->itemDispenser()->fetchAll();

		$this->module()->cook( 'admin.items', [ 'items' => $blogs, 'item_add_form' => $page_add_form, 'item_delete_form' => $page_delete_form ] );
	}

	public function itemDispenser()
	{
		$class = $this->J()->fx()->getFromNameSpace(  'Item', get_called_class() ) ;

		return $class::I()->D();
	}



	public function itemAddForm()
	{
		if( $this->su()->canAdd( $this->itemName() ) )
		{
			$formClass = $this->J()->fx()->getFromNameSpace(  'Item_Add_Form', get_called_class() ) ;

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
			$formClass = $this->J()->fx()->getFromNameSpace(  'Item_Delete_Form', get_called_class() ) ;

			$form = new $formClass;

			if( $form->isSubmitted() )
			{
				$form->process();
			}

			return $form;
		}

	}

	public function su()
	{
		return $this->app()->m('admin')->su();
	}

}
