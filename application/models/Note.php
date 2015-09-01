<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Controller {
	public function add($post){
		$query="INSERT INTO notes (title, created_at, updated_at) VALUES (?, NOW(), NOW())";
		$values=$post['title'];
		$this->db->query($query, $values);
		return $this->db->insert_id();
		}

	public function get_all(){
		$query = "SELECT * FROM notes";
		return $this->db->query($query)->result_array();
	}

	public function update($post){
		$query = "UPDATE notes SET description = ?, updated_at = NOW() WHERE id = ?";
		$values = array($post['description'], $post['note_id']);
		$this->db->query($query, $values);
		redirect("/");
	}

	public function delete($post){
		$query = "DELETE FROM notes WHERE id = ?";
		$values = array($post['note_id']);
		$this->db->query($query, $values);
		redirect("/");
	}
}