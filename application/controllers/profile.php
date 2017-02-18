<?php
class Profile extends CI_Controller{
	
	public function index(){
		
		$this->load->model('membership_model');							
		$data['main_content'] = 'members_area';
		$data['page']='Dummy';
		$data['query']=$this->membership_model->profile();
		$this->load->view('includes/template', $data);		
	}

	public function home(){
		
		$data['main_content'] = 'login_form';
		$this->session->sess_destroy();		
		$this->load->view('includes/template', $data);
	}
        
    public function change_pic()
	{
		if($this->session->userdata('is_logged_in')){
			$this->load->model('membership_model');
			if ($this->input->post('upload')) {
				$this->membership_model->change_pic();
			}

	        $data['main_content'] = 'members_area';
			$data['page']='Dummy';
			$data['query']=$this->membership_model->profile();
			$this->load->view('includes/template', $data);
		}
		else{
			$this->home();
		}
		
	}
	
	public function get_profile(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('membership_model');
			$data['main_content'] = 'edit_profile';
			$data['page']='Dummy';
			$data['query']=$this->membership_model->profile();
			$this->load->view('includes/template', $data);
		}
		else{
			$this->home();
		}
		
	}
	
	public function edit_profile(){
		
        if($this->session->userdata('is_logged_in')){
        	$this->load->model('membership_model');
			if($this->membership_model->update_member()) {
				$this->get_profile();
			}
			else {
				$this->load->view('edit_profile');
			}
        }
        else{
        	$this->home();
        }
        
		
	}
	
	public function change_pass(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('membership_model');
			$data['page']="Dummy";
			$data['query']=$this->membership_model->profile();		
			$data['main_content'] = 'change_pass';
			$this->load->view('includes/template', $data);
		}
		else{
			$this->home();
		}
		
	}
	
	public function update_pass(){

		if($this->session->userdata('is_logged_in')){
			$this->load->model('membership_model');
			if($this->membership_model->update_pass()) {
				$this->logout();
			}
			else {
				$this->change_pass();
			}
		}
		else{
			$this->home();
		}				
	}
	
	
	public function add_friends(){
            
       	if($this->session->userdata('is_logged_in')){
       		
       		$this->load->model('membership_model');
       		$this->load->library("pagination");

       		$config = array();
            $config["base_url"] = site_url() . "/profile/add_friends";
            $config["total_rows"] = $this->membership_model->get_user_count();
            $config["per_page"] = 6;
            $config["uri_segment"] = 3;
            $config['num_links'] = 2;
            $this->pagination->initialize($config);
            $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data["links"] = $this->pagination->create_links();

   		   
			$data['page']="Add Friends";
			$data['query']=$this->membership_model->get_user($config["per_page"],$start);
			$data['main_content'] = 'add_friends';
            $data['search']='no';
			$this->load->view('includes/template', $data);
       	}
       	else{
       		$this->home();
       	}
        
	}
        
    public function search_friends(){

    	if($this->session->userdata('is_logged_in')){
    		if($_POST['friends_name']){
    			$this->load->model('membership_model');
	            $data['friends_name']=$this->input->post('friends_name');
	            $this->session->set_userdata($data);
	            $data['query']=$this->membership_model->get_friends();
				$data['main_content'] = 'add_friends';
	            $data['search']='yes';
				$this->load->view('includes/template', $data);
    		}
		 	
    	}
    	else{
    		$this->home();
    	}           
    }

    public function user_info($user_id){

    	if($this->session->userdata('is_logged_in')){
    		$this->load->model('membership_model');
            $data['query']= $this->membership_model->get_specific_user($user_id);
            $data['check']=  $this->membership_model->check_friends($user_id);
			$data['main_content'] = 'user_info';
			$this->load->view('includes/template', $data);
    	}
    	else{
    		$this->home();
    	}                 
    }
        
    public function follow_friends($follower_id){

    	if($this->session->userdata('is_logged_in')){
    		$this->load->model('membership_model');
	        $data['check']=  $this->membership_model->update_followers($follower_id);
	        $data['query']= $this->membership_model->get_specific_user($follower_id);
	        $data['main_content'] = 'user_info';
	        $this->load->view('includes/template', $data);
    	}
    	else{
    		$this->home();
    	}                        
    }
        
    public function unfollow_friends($follower_id){

    	if($this->session->userdata('is_logged_in')){
    		$this->load->model('membership_model');
        	$this->membership_model->delete_followers($follower_id);
        	$this->user_info($follower_id);
    	}
    	else{
    		$this->home();
    	}                        
    }                

    public function friends_ratings(){

    	if($this->session->userdata('is_logged_in')){
    		$data['main_content']='friends_rating';
	    	$data['search']='empty';
	    	$this->load->view('includes/template', $data);
    	}
    	else{
    		$this->home();
    	}
    	
    }

    public function friends_rating(){

    	if($this->session->userdata('is_logged_in')){

    			$this->load->model('membership_model');
    			$this->load->library("pagination");

	       		$config = array();
	            $config["base_url"] = site_url() . "/profile/friends_rating";
	            $config["total_rows"] = $this->membership_model->get_followers_count();
	            $config["per_page"] = 6;
	            $config["uri_segment"] = 3;
	            $config['num_links'] = 2;
	            $this->pagination->initialize($config);
	            $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	            $data["links"] = $this->pagination->create_links();

		    	$data['query']=$this->membership_model->get_followers($config["per_page"],$start);                
		    	$data['search']='friends';
		    	$data['main_content']='friends_rating';
		    	$this->load->view('includes/template', $data);
			
    		
    	}
    	else{
    		$this->home();
    	}    	
    }

    public function follower_ratings($follower_id){

    	if($this->session->userdata('is_logged_in')){
    		$this->load->model('membership_model');
    		$this->load->library("pagination");

	       		$config = array();
	            $config["base_url"] = site_url() . "/profile/follower_ratings";
	            $config["total_rows"] = $this->membership_model->get_followers_ratings_count($follower_id);
	            $config["per_page"] = 2;
	            $config["uri_segment"] = 3;
	            $config['num_links'] = 2;
	            $this->pagination->initialize($config);
	            $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	            $data["links"] = $this->pagination->create_links();

    		$data['query']=$this->membership_model->get_followers_ratings($follower_id);
            $data['query_1']=$this->membership_model->get_specific_user($follower_id);
	    	$data['search']='ratings';
	    	$data['main_content']='friends_rating';
	    	$this->load->view('includes/template', $data);
    	}
    	else{
    		$this->home();
    	}    	
    }

    public function logout(){
	
		$data['main_content'] = 'login_form';
		$this->session->sess_destroy();		
		$this->load->view('includes/template', $data);
	}                               
}

?>