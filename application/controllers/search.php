<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Search extends CI_Controller{
	
	public function index(){
		$data['main_content'] = 'Search/index.php';
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
                $config["base_url"] = site_url() . "/search/food_items";
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
		$data['main_content'] = 'Search/food_items';
		$this->load->view('includes/template', $data);
	}
        function food_info($food_id){
                $this->load->model('search_model');
                $data['food_info']= $this->search_model->get_specific_food($food_id);
		$data['main_content'] = 'Search/food_info';
		$this->load->view('includes/template', $data);
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
		$data['main_content'] = 'Search/restaurants';
		$this->load->view('includes/template', $data);
	}
        function restaurant_info($restaurant_id){
                
                $this->load->library("pagination");
                $this->load->model('search_model');
                $config = array();
                $config["base_url"] = site_url() . "/search/restaurant_info/"."{$restaurant_id}";
                $config["total_rows"] = $this->search_model->get_rest_foods_count($restaurant_id);
                $config["per_page"] = 10;
                $config["uri_segment"] = 4;
                $config['num_links'] = 2;
                $this->pagination->initialize($config);
                $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                 $data['rest_foods']= $this->search_model->get_rest_foods($restaurant_id,$start,$config["per_page"]);
                $data["links"] = $this->pagination->create_links();
                $data['restaurant_info']= $this->search_model->get_specific_restaurant($restaurant_id);
		$data['main_content'] = 'Search/restaurant_info';
		$this->load->view('includes/template', $data);
        }
	public function nearest_restaurants(){
		$data['page']="Search Nearest Restaurants";
		$data['main_content'] = 'under_construct';
		$this->load->view('includes/template', $data);
	}
	
	public function routes_in_map(){
		$data['page']="Find Routes in Map";
		$data['main_content'] = 'under_construct';
		$this->load->view('includes/template', $data);
	}
}

?>
