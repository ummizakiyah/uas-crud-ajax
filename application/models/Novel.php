<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

class Novel extends CI_Model {

	var $table = 'books';

	public function novel_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function getAllNovel() {
		$this->db->from('books');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($book_id) {
		$this->db->from('books');
		$this->db->where('book_id', $book_id);
		$query = $this->db->get();

		return $query->row();
	}

	public function novel_update($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function novel_delete($book_id) {
		$this->db->where('book_id', $book_id);
		$this->db->delete($this->table);
	}
}