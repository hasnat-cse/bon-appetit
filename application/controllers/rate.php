<?php
class Rate extends CI_Controller{
	
	public function index(){
		$data['main_content'] = 'Rate/index.php';
		$this->load->view('includes/template', $data);
	}
	
	public function food_items(){
            if($this->session->userdata('is_logged_in')){
		$this->load->model('search_model');
                $this->load->model('rate_model');
                $this->load->library("pagination");
                
                $food_name='';
                $restaurant_name='';
                $district='';
                $rating=0;
                if(isset($_POST['food_name']))
                {
                    $food_name=$_POST['food_name'];
                }
                if(isset($_POST['restaurant_name']))
                {
                    $restaurant_name=$_POST['restaurant_name'];
                }
                if(isset($_POST['district']))
                {
                    $district=$_POST['district'];
                }
          
                $config = array();
                $config["base_url"] = site_url() . "/rate/food_items";
                $config["total_rows"] = $this->search_model->get_food_count($food_name,$restaurant_name,$district,$rating);
                $config["per_page"] = 10;
                $config["uri_segment"] = 3;
                $config['num_links'] = 2;
                $this->pagination->initialize($config);
                $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                
		$data['foods']= $this->search_model->get_foods($food_name,$restaurant_name,$district,$rating,
                        $start,$config["per_page"]);
                $i=0;
                foreach($data['foods'] as $row){
                    $data['myrating'][$i++]=$this->rate_model->get_foodRating($row['food_id'],$this->session->userdata('user_id'));
                }
                $data["links"] = $this->pagination->create_links();
                $data['food_name']=$food_name;
                $data['restaurant_name']=$restaurant_name;
                $data['district']=$district;
		$data['main_content'] = 'Rate/food_items';
		$this->load->view('includes/template', $data);
            }
            else {
                $data['main_content'] = 'login_form';
                $this->load->view('includes/template', $data);
            }
	}
	function food_info($food_id){
            if($this->session->userdata('is_logged_in')){
                $this->load->model('search_model');
                $this->load->model('rate_model');
                $data['food_info']= $this->search_model->get_specific_food($food_id);
                $data['myrating']=$this->rate_model->get_foodRating($food_id,$this->session->userdata('user_id'));
		$data['main_content'] = 'Rate/food_info';
		$this->load->view('includes/template', $data);
            }
            else {
                $data['main_content'] = 'login_form';
                $this->load->view('includes/template', $data);
            }
        }
        function submit_foodRating($food_id){
             $this->load->model('rate_model');
             $rating=$_POST['rating'];
             if($rating>0){
                $this->rate_model->update_foodRating($food_id,$rating,$this->session->userdata('user_id'));
             }
             $this->food_info($food_id);
        }
	public function restaurants(){
            if($this->session->userdata('is_logged_in')){
                $this->load->library("pagination");
                $this->load->model('search_model');
                $this->load->model('rate_model');
                $restaurant_name='';
                $district='';
                $rating=0;
                if(isset($_POST['restaurant_name']))
                {
                    $restaurant_name=$_POST['restaurant_name'];
                }
                if(isset($_POST['district']))
                {
                    $district=$_POST['district'];
                }
                $config = array();
                $config["base_url"] = site_url() . "/rate/restaurants";
                $config["total_rows"] = $this->search_model->get_restaurant_count($restaurant_name,$district,$rating);
                $config["per_page"] = 10;
                $config["uri_segment"] = 3;
                $config['num_links'] = 2;
                $this->pagination->initialize($config);
                $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
               
		$data['restaurants']= $this->search_model->get_restaurants($restaurant_name,$district,$rating,$start,$config["per_page"]);
                
                $i=0;
                foreach($data['restaurants'] as $row): {
                    $data['myrating'][$i++]=$this->rate_model->get_restRating($row['restaurant_id'],$this->session->userdata('user_id'));
                }
                endforeach;
                $data["links"] = $this->pagination->create_links();
                $data['restaurant_name']=$restaurant_name;
                $data['district']=$district;
		$data['main_content'] = 'Rate/restaurants';
		$this->load->view('includes/template', $data);
            }
            else {
                $data['main_content'] = 'login_form';
                $this->load->view('includes/template', $data);
            }
	}
        function restaurant_info($restaurant_id){
             if($this->session->userdata('is_logged_in')){
                $this->load->model('search_model');
                $this->load->model('rate_model');
                $data['restaurant_info']= $this->search_model->get_specific_restaurant($restaurant_id);
                $data['myrating']=$this->rate_model->get_restRating($restaurant_id,$this->session->userdata('user_id'));
		$data['main_content'] = 'Rate/restaurant_info';
		$this->load->view('includes/template', $data);
             }
            else {
                $data['main_content'] = 'login_form';
                $this->load->view('includes/template', $data);
            }
        }
        function submit_restRating($restaurant_id){
            $this->load->model('rate_model');
            $rating=$_POST['rating'];
            if($rating>0){
                $this->rate_model->update_restRating($restaurant_id,$rating,$this->session->userdata('user_id'));
            }
            $this->restaurant_info($restaurant_id);
        }
	public function write_compliments(){
		$data['page']="Write Compliments";
		$data['main_content'] = 'under_construct';
		$this->load->view('includes/template', $data);
	}
}
?>