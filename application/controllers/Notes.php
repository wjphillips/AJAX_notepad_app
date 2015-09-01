<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {
	public function index()
	{
		$this->load->model('Note');
		$notes = $this->Note->get_all();
		$this->load->view('main', array("notes"=>$notes));
	}

	public function add(){
		$this->load->model('Note');
		$id = $this->Note->add($this->input->post());
		$data = array("title" => $this->input->post('title'), "id" => $id);
		$note = $this->parser->parse('partials/note', $data, TRUE);
		echo json_encode(array("type" => "create", "note"=>$note));
	}

	public function update(){
		$this->load->model('Note');
		$this->Note->update($this->input->post());
		echo json_encode("Updated");
	}

	public function delete(){
		$this->load->model('Note');
		$this->Note->delete($this->input->post());
		echo json_encode(array("type" => "delete"));
	}
}