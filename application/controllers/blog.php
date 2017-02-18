<?php
class Blog extends CI_Controller{
	
	public function index(){
		$data['page']="Blog";
		$data['main_content'] = 'under_construct';
		$this->load->view('includes/template', $data);
	}
	
	public function write_blog(){
		$data['page']="Write Blog";
		$data['main_content'] = 'under_construct';
		$this->load->view('includes/template', $data);
	}
	
	public function search_post(){
		$data['page']="Search Blog";
		$data['main_content'] = 'under_construct';
		$this->load->view('includes/template', $data);
	}
}
?>