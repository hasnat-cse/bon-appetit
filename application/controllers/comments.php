<?php
class Comments extends CI_Controller{
	
	public function index(){
		$data['main_content'] = 'Comments/index.php';
		$this->load->view('includes/template', $data);
	}
	
	public function food_items(){
                $this->load->model('search_model');
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
                if(isset($_POST['rating']))
                {
                    $rating=$_POST['rating'];
                }
          
                $config = array();
                $config["base_url"] = site_url() . "/comments/food_items";
                $config["total_rows"] = $this->search_model->get_food_count($food_name,$restaurant_name,$district,$rating);
                $config["per_page"] = 10;
                $config["uri_segment"] = 3;
                $config['num_links'] = 2;
                $this->pagination->initialize($config);
                $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                
		$data['foods']= $this->search_model->get_foods($food_name,$restaurant_name,$district,$rating,
                        $start,$config["per_page"]);
                
                $data["links"] = $this->pagination->create_links();
                $data['food_name']=$food_name;
                $data['restaurant_name']=$restaurant_name;
                $data['district']=$district;
		$data['main_content'] = 'Comments/food_items';
		$this->load->view('includes/template', $data);
	}
	public function food_comments($food_id){
                $this->load->library("pagination");
                $this->load->model('comments_model');
                $config = array();
                $config["base_url"] = site_url() . "/comments/food_comments/"."{$food_id}";
                $config["total_rows"] = $this->comments_model->get_foodComments_count($food_id);
                $config["per_page"] = 10;
                $config["uri_segment"] = 4;
                $config['num_links'] = 2;
                $this->pagination->initialize($config);
                $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data['food_comments']= $this->comments_model->get_foodComments($food_id,$start,$config["per_page"]);
                if($this->session->userdata('is_logged_in')){
                       $data['user_id']=$this->session->userdata('user_id');
                }
                $data['food_id']=$food_id;
                $data["links"] = $this->pagination->create_links();
		$data['main_content'] = 'Comments/food_comments';
		$this->load->view('includes/template', $data);
        }
        public function post_foodComment($food_id){
             $this->load->model('comments_model');
             $comment=$_POST['comment'];
             $this->comments_model->post_foodComment($food_id,$comment,$this->session->userdata('user_id'));
             $this->food_comments($food_id);
        }
	public function restaurants(){
                $this->load->library("pagination");
                $this->load->model('search_model');
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
                if(isset($_POST['district']))
                {
                    $rating=$_POST['rating'];
                }
                $config = array();
                $config["base_url"] = site_url() . "/search/restaurants";
                $config["total_rows"] = $this->search_model->get_restaurant_count($restaurant_name,$district,$rating);
                $config["per_page"] = 10;
                $config["uri_segment"] = 3;
                $config['num_links'] = 2;
                $this->pagination->initialize($config);
                $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
               
		$data['restaurants']= $this->search_model->get_restaurants($restaurant_name,$district,$rating,$start,$config["per_page"]);
                $data["links"] = $this->pagination->create_links();
                $data['restaurant_name']=$restaurant_name;
                $data['district']=$district;
		$data['main_content'] = 'Comments/restaurants';
		$this->load->view('includes/template', $data);
	}
        public function restaurant_comments($restaurant_id){
                $this->load->library("pagination");
                $this->load->model('comments_model');
                $config = array();
                $config["base_url"] = site_url() . "/comments/restaurant_comments/"."{$restaurant_id}";
                $config["total_rows"] = $this->comments_model->get_restaurantComments_count($restaurant_id);
                $config["per_page"] = 10;
                $config["uri_segment"] = 4;
                $config['num_links'] = 2;
                $this->pagination->initialize($config);
                $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data['restaurant_comments']= $this->comments_model->get_restaurantComments($restaurant_id,$start,$config["per_page"]);
                if($this->session->userdata('is_logged_in')){
                       $data['user_id']=$this->session->userdata('user_id');
                }
                $data['restaurant_id']=$restaurant_id;
                $data["links"] = $this->pagination->create_links();
		$data['main_content'] = 'Comments/restaurant_comments';
		$this->load->view('includes/template', $data);
        }
         public function post_restaurantComment($restaurant_id){
             $this->load->model('comments_model');
             $comment=$_POST['comment'];
             $this->comments_model->post_restaurantComment($restaurant_id,$comment,$this->session->userdata('user_id'));
             $this->restaurant_comments($restaurant_id);
        }
}
?>