<?php


class News_model extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}

	public function get_news( $slug = FALSE )
	{
		if(FALSE ==  $slug)
		{
			$query = $this->db->get('news');
			return  $query->result_array();
		}

		$query = $this->db->get_where( 'news', ['slug' => $slug] );

		return $query->row_array() ;

	}

	public function set_news()
	{
		$this->load->helper('url');

		//$slug = url_title( $this->input->post('title'), 'dash', TRUE );

		$data =
		[
			'title' => $this->input->post('title'),
			'text' => $this->input->post('text'),
			'slug' => url_title( $this->input->post('title'), 'dash', TRUE ),
		];

		$this->db->insert('news', $data );
	}
}
