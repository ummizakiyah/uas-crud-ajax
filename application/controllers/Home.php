<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('novel');
	}

	public	function index()
	{
		$data['buku'] = $this->novel->getAllNovel();
		$this->load->view('Home/v_dashboard', $data);
	}

	public function novel_add()
	{
		$data = array (
				'book_isbn' => $this->input->post('book_isbn'),
				'book_title' => $this->input->post('book_title'),
				'book_author' => $this->input->post('book_author'),
				'book_cathegory' => $this->input->post('book_cathegory')
		);

		$insert = $this->novel->novel_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($book_id)
	{
		$data = $this->novel->get_by_id($book_id);
		echo json_encode($data);
	}

	public function novel_update()
	{
		$data = array(
				'book_isbn' => $this->input->post('book_isbn'),
				'book_title' => $this->input->post('book_title'),
				'book_author' => $this->input->post('book_author'),
				'book_cathegory' => $this->input->post('book_cathegory')
		);
		$this->novel->novel_update(array('book_id' => $this->input->post('book_id')), $data);
		echo json_encode(array("status" => TRUE));	
	}

	public function novel_delete($book_id)
	{
		$this->novel->novel_delete($book_id);
		echo json_encode(array("status" => TRUE));
	}
}
?>