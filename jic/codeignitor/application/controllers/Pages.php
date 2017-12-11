<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function view( $page = 'home' )
	{
		$param['title'] = ucfirst($page);
		$this->load->view('templates/header', $param  );
		$this->load->view('pages/'.$page, $param);
		$this->load->view('templates/footer', $param);
	}
}
