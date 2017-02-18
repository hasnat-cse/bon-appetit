<?php
class Admin_model extends CI_Model{

	public function validate(){
	         
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->where('password', md5($this->session->userdata('password')));
		$query = $this->db->get('admin');

		if($query->num_rows == 1) {
			$query = $this->db->query("select distinct restaurant.name as rname, restaurant.address as address, restaurant.district as district, restaurant.imglink as imglink\n"
    		. "from admin,restaurant\n"
    		. "where admin.restaurant_id={$this->session->userdata('restaurant_id')} and restaurant.restaurant_id=admin.restaurant_id");    		
			return $query->result();
		}
		else {
			return "Dummy";
		}
	}

	public function create_admin(){
        
		$query = $this->db->get('admin');
		$id=$query->num_rows+1;
		$new_admin_insert_data = array(						
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'restaurant_id' => $id
		);

		$insert = $this->db->insert('admin', $new_admin_insert_data);

		$admin_insert_data = array(
			'name' => "empty",				
			'address' => "empty",
			'district' => "empty"
		);
		if($insert){
			$this->db->insert('restaurant', $admin_insert_data);	
		}		

		return $insert;
	}

	public function get_id(){
            
        $this->db->where('username', $this->session->userdata('username'));
		$this->db->where('password', md5($this->session->userdata('password')));
		$query = $this->db->get('admin');
            if($query->num_rows == 1){
                foreach ($query->result() as $value) :{
                    $id=$value->admin_id;
                }
                endforeach;
            return $id;
            }
    }

  	public function get_res_id(){
            
        $this->db->where('username', $this->session->userdata('username'));
		$this->db->where('password', md5($this->session->userdata('password')));
		$query = $this->db->get('admin');
            if($query->num_rows == 1){
                foreach ($query->result() as $value) :{
                    $id=$value->restaurant_id;
                }
                endforeach;
            return $id;
            }
    }

    public function update_info(){

    	$admin_update_data = array(
				'name' => $this->input->post('name'),				
				'address' => $this->input->post('address'),
				'district' => $this->input->post('district')				
		);
	
		$this->db->where('restaurant_id', $this->session->userdata('restaurant_id'));
		$update = $this->db->update('restaurant', $admin_update_data);
		return $update;
    }

    public function update_food_info(){

        $admin_update_data = array(
            'name' => $this->input->post('name')                                            
        );
    
        $this->db->where('restaurant_id', $this->session->userdata('restaurant_id'));
        $this->db->where('food_id', $this->session->userdata('food_id'));
        $update = $this->db->update('food', $admin_update_data);
        return $update;
    }

    var $gallery_path;
    public function change_pic(){
            $this->gallery_path = realpath(APPPATH . '../images');        
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $this->gallery_path
            ); 

            $this->load->library('upload', $config);                
            $this->upload->do_upload();
            $image_data = $this->upload->data();                

            $content = array(
                'imglink' => 'images/'.$image_data['file_name']			
            );

            $this->db->where('restaurant_id',$this->session->userdata('restaurant_id'));
            $update=$this->db->update('restaurant',$content);
            return $update;
    }

    public function change_food_pic(){
            $this->gallery_path = realpath(APPPATH . '../images');        
            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png',
                'upload_path' => $this->gallery_path
            ); 

            $this->load->library('upload', $config);                
            $this->upload->do_upload();
            $image_data = $this->upload->data();                

            $content = array(
                'imglink' => 'images/'.$image_data['file_name']         
            );

            $this->db->where('restaurant_id',$this->session->userdata('restaurant_id'));
            $this->db->where('food_id',$this->session->userdata('food_id'));
            $update=$this->db->update('food',$content);
            return $update;
    }

    public function get_food_items(){

    	$this->db->where('restaurant_id',$this->session->userdata('restaurant_id'));
    	$query=$this->db->get('food');

    	return $query->result();
    }

    public function get_specific_food_items($food_id){

    	$this->db->where('food_id',$food_id);
    	$query=$this->db->get('food');

    	return $query->result();
    }

    public function add_items(){

        $this->db->where('restaurant_id',$this->session->userdata('restaurant_id'));
        $this->db->where('name',$this->input->post('add_items'));
        $query=$this->db->get('food');

        if($query->num_rows>0){
                return;
        }
        else{
            $content = array(
                'restaurant_id' => $this->session->userdata('restaurant_id'),
                'name' => $this->input->post('add_items')         
            );

            $insert=$this->db->insert('food',$content);
            return $insert;
        }

        
    }

    public function remove_food_items($food_id){

        $this->db->where('food_id',$food_id);
        $this->db->where('restaurant_id',$this->session->userdata('restaurant_id'));
        $this->db->delete('food');
    }

    public function search(){
           
        $this->db->where('restaurant_id',$this->session->userdata('restaurant_id'));
        $this->db->like('name', $this->input->post('remove_items'), 'after');
        $query=  $this->db->get('food');
        return $query->result();
    }
}