<?php

class Login extends CI_Controller {

	public function index(){
		
		$data['main_content'] = 'login_form';
		$this->session->sess_destroy();		
		$this->load->view('includes/template', $data);
	}

	public function validate_credentials(){

		$this->load->model('membership_model');			
		
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),                                
			'is_logged_in' => true				
		);
        
		$this->session->set_userdata($data);			
		$data['user_id']=$this->membership_model->get_id();
        $this->session->set_userdata($data);

		$data['main_content'] = 'members_area';
		$data['page']='Dummy';
		$data['query']=$this->membership_model->validate();		
		
		if($data['query']== 'Dummy'){
			$this->index();
		}
		else{
			$this->load->view('includes/template', $data);
		} 				
				
	}

	public function signup() {

		$data['main_content'] = 'signup_form';		
		$this->load->view('includes/template', $data);

	}

	public function create_member(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE) {
			$this->signup();
		}
		else {			
            $this->load->model('membership_model');
			if($query = $this->membership_model->create_member()) {
				$data['main_content'] = 'signup_successful';
				$data['page']='Dummy';
				$data['query']='Dummy';
				$this->load->view('includes/template', $data);
			}
			else {
				$this->load->view('signup_form');
			}
		}
	}

	public function logout(){
	
		$this->session->sess_destroy();		
		$this->load->view('home');
	}
}