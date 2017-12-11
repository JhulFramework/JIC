<?php namespace _modules\user\nodes\member\auth\logout;

class Handler extends \Jhul\Core\Application\Handler\_Class
{
	public function handle()
	{
		echo '<pre>';
		echo '<br/> File : <br/>'.__FILE__.':'.__LINE__.'</br></br>';
		var_dump('break');
		echo '</pre>';
		exit();
		$this->getApp()->user()->logout();
		$this->getApp()->redirect( $this->getApp()->url() );
	}
}
