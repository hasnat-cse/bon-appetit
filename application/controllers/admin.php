<?php
class Admin extends CI_Controller{

	public function index(){		

		$this->load->view('admin_login');
	}

	public function admin_area(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			$data['query']=$this->admin_model->validate();

			if($data['query']== 'Dummy'){
				$this->index();
			}
			else{
				$this->load->view('admin_area', $data);
			}
		}
		else{
			$this->index();
		}		
	}

	public function validate_credentials(){

		if(isset($_POST)){
			$this->load->model('admin_model');
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),                                
				'is_logged_in' => true				
			);
                
			$this->session->set_userdata($data);
			$data['admin_id']=$this->admin_model->get_id();
			$data['restaurant_id']=$this->admin_model->get_res_id();
            $this->session->set_userdata($data);			
			$data['query']=$this->admin_model->validate();		
			
			if($data['query']== 'Dummy'){
				$this->index();
			}
			else{
				$this->load->view('admin_area', $data);
			} 
		}
		else{
			$this->index();
		}
		

	}

	public function signup(){

		$this->load->view('signup_form_admin');
	}

	public function create_admin(){

		if(isset($_POST)){
			$this->load->library('form_validation');			

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');

			if($this->form_validation->run() == FALSE) {
				$this->signup();
			}
			else {			
                $this->load->model('admin_model');
				if($query = $this->admin_model->create_admin()) {
					$this->load->view('admin_login');
				}
				else {
					$this->load->view('signup_form_admin');
				}
			}
		}
		else{
			$this->index();
		}

		
	}

	public function change_pic(){
	
		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			if ($this->input->post('upload')) {
				if($this->admin_model->change_pic()){
					$data['query']=$this->admin_model->validate();							
					$this->load->view('admin_area', $data);
				}
				else {
					$this->validate_credentials();
				}
			}
			else{
				$this->validate_credentials();
			}	
		}
		else{
			$this->index();
		}
			     	
	}

	public function change_food_pic(){
	
		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			if ($this->input->post('upload')) {
				if($this->admin_model->change_food_pic()){
					$this->food_edit($this->session->userdata('food_id'));
				}
				else {
					$this->food_edit($this->session->userdata('food_id'));
				}
			}
			else{
				$this->food_edit($this->session->userdata('food_id'));
			}	
		}
		else{
			$this->index();
		}
			     	
	}

	public function update_info(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			if($this->admin_model->update_info()) {
				$data['query']=$this->admin_model->validate();							
				$this->load->view('admin_area', $data);
			}
			else {
				$this->validate_credentials();
			}
		}
		else{
			$this->index();
		}
		
	}

	public function add_food(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			$data['query']=$this->admin_model->get_food_items();
			$this->load->view('add_food',$data);
		}
		else{
			$this->index();
		}
		
	}

	public function add_items(){

		if($this->session->userdata('is_logged_in')){
			if(isset($_POST['add_items'])){
				$this->load->model('admin_model');
				$this->admin_model->add_items();
				$_POST['add_items']=null;
				$this->add_food();
			}
			else{
				$this->add_food();
			}
		}
		else{
			$this->index();
		}
		

		
	}

	public function food_edit($food_id){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			$data['food_id']=$food_id;
			$this->session->set_userdata($data);
			$data['query']=$this->admin_model->get_specific_food_items($food_id);
			$this->load->view('food_edit',$data);
		}
		else{
			$this->index();
		}
		

	}

	public function update_food_info(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			$this->admin_model->update_food_info();
			$this->food_edit($this->session->userdata('food_id'));
		}
		else{
			$this->index();
		}
		
	}

	public function remove_food(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			$data['query']=$this->admin_model->get_food_items();
			$this->load->view('remove_food',$data);
		}
		else{
			$this->index();
		}
	}

	public function remove_food_items($food_id){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			$this->admin_model->remove_food_items($food_id);
			$this->remove_food();
		}
		else{
			$this->index();
		}		
	}

	public function search_items(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('admin_model');
			$data['query']=$this->admin_model->search();
			$this->load->view('remove_food',$data);
		}
		else{
			$this->index();
		}

		
	}

	public function logout(){
	
		$this->session->sess_destroy();		
		$this->load->view('admin_login');
	}
}