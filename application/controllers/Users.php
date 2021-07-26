<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation'));
		$this->load->database();
		$this->load->model('UserModel');
	}

	public function index()
	{
		
		$this->load->view('templates/header');
		$this->load->view('welcome_message');
		$this->load->view('templates/footer');
	}

	public function get_data(){
		
		$data = $this->UserModel->get_data();
		echo json_encode($data);
	}

	public function insert(){
		
		if($this->input->is_ajax_request()){
			
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
			if($this->form_validation->run() == FALSE){
				$data = array('response' => 'error', 'message' => validation_errors());
			}else{
				$ajax_data = $this->input->post();
				if($this->UserModel->insert_entry($ajax_data)){
					$data = array('response' => 'success', 'message' => 'Data has been inserted!');
				}else{
					$data = array('response' => 'error', 'message' => 'Something went wrong...');
				}
			}
		}else{
			echo "No direct script access allowed";
		}
		echo json_encode($data);
	}

	public function update(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('email', 'Email', 'valid_email');

			if($this->form_validation->run() == FALSE){
				$data = array('response' => 'error', 'message' => validation_errors());
			}else{
				$ajax_data = $this->input->post();
				if($this->UserModel->update($ajax_data)){
					$data = array('response' => 'success', 'message' => 'Data has been updated');
				}else{
					$data = array('response' => 'error', 'message' => 'Something went wrong...');
				}
			}
		}else{
			echo "No direct script access allowed";
		}
		echo json_encode($data);
	}


	public function delete(){
		if($this->input->is_ajax_request()){
			$ajaxData = $this->input->post();
			if($this->UserModel->delete($ajaxData)){
				$data = array('response' => 'success', 'message' => 'Data has been deleted');
			}else{
				$data = array('response' => 'error', 'message' => 'Something went wrong...');
			}
		}
		echo json_encode($data);
	}
}
