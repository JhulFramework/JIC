<?php namespace _modules\user\models\member\s\eav;


abstract class _ImageValue
{
	use \Jhul\Core\_AccessKey;

	protected function user()
	{
		return $this->entity();
	}

	public function dataType(){ return $this->app()->mDataType( $this->name() ); }

	public function url(){ return $this->dataType()->url( $this->value() ); }

	function changeTo( $src )
	{
		$this->dispose();

		$uploader = $this->dataType()->uploader( $src );

		$this->J()->g('E')->mute('W');

		$this->user()->set( $this->name() , $uploader->sanitize()->setRescaleMode('shrink')->save(), TRUE);

		$this->J()->g('E')->unmute('W');

		$this->user()->save();
	}

	function dispose()
	{
		$file = $this->dataType()->uploadPath( $this->value() );

		if( is_file( $file ) )
		{
			echo '<pre>';
			echo '<br/> File : <br/>'.__FILE__.':'.__LINE__.'</br></br>';
			var_dump( $file );
			echo '</pre>';
			exit();
			@unlink($file);
		}
	}

}
