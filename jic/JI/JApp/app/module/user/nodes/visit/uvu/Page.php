<?php namespace _modules\user\nodes\visit\uvu;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage()
	{
		echo '<pre>';
		echo '<br/> File : <br/>'.__FILE__.':'.__LINE__.'</br></br>';
		var_dump('break');
		echo '</pre>';
		exit();
		$host = $this->module()->mUser()->findHost( $this->route()->getParam( 'host_iname', 'iname' )->value()  );

		$this->getApp()->user()->set( 'host',  $host );

		return  'user#access_user_'.$host->context() ;
	}

}
