<?php namespace _modules\gui\nodes\admin;

class Item extends \_modules\gui\db\resource\M
{
	use \Jhul\Components\Database\Store\Data\_WriteAccessKey;

	public function context()
	{
		return 'write' ;
	}

	public function adminURL( $field = NULL )
	{
		if( NULL != $field )
		{
			return $this->adminURL().'&field='.$field;
		}
		return $this->module()->adminURL().'?item='.$this->key();
	}

	public function setScript( $script )
	{
		if( NULL == $this->content() )
		{
			$this->store()->createContent( $this, ['script' => $script] );
			$this->content(TRUE);
		}
		else
		{
			$this->content()->write( 'script', $script )->commit();
		}
	}

	public function setStyle( $style )
	{
		if( NULL == $this->content() )
		{
			$this->store()->createContent( $this, ['style' => $style] );
			$this->content(TRUE);
		}
		else
		{
			$this->content()->write( 'style', $style )->commit();
		}
	}

}
