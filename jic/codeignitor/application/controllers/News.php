<?php

class News extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('news_model');

		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News Items';


		$this->loadView('index', $data );
		
	}

	public function view( $slug = '' )
	{
		$data['news_item'] = $this->news_model->get_news( $slug );

		if( empty($data['news_item']) )
		{
			show_404();
		}

		$data['title'] = $data['news_item']['title'];

		$this->loadView( 'view', $data );
	}


	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create News Item';

		$this->form_validation->set_rules( 'title', 'Title', 'required' );
		$this->form_validation->set_rules( 'text', 'Text', 'required' );

		if( $this->form_validation->run() )
		{
			$this->news_model->set_news();
			$this->loadView('success', $data);
		}
		else
		{
			$this->loadView('create', $data);

		}

	}

	private function loadView($name, $data = [] )
	{
		$this->load->view('templates/header', $data);
		$this->load->view('news/'.$name, $data);
		$this->load->view('templates/footer');
	}

}
