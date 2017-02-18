<?php

class Membership_model extends CI_Model {
	
	public function validate(){ 
	                
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->where('password', md5($this->session->userdata('password')));
		$query = $this->db->get('user');

		if($query->num_rows == 1){
			return $query->result();
		}
		else{
			return "Dummy";
		}
	}
        
    public function get_id(){
            
        $this->db->where('username', $this->session->userdata('username'));
		$this->db->where('password', md5($this->session->userdata('password')));
		$query = $this->db->get('user');
        if($query->num_rows == 1){
            foreach ($query->result() as $value) :{
                $id=$value->user_id;
            }
            endforeach;
        return $id;
        }
    }

    public function profile(){
	
		$this->db->where('user_id', $this->session->userdata('user_id'));		
		$query = $this->db->get('user');
		
		if($query->num_rows == 1){
			return $query->result();
		}		
	
   }

	public function create_member(){

		$new_member_insert_data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);

		$insert = $this->db->insert('user', $new_member_insert_data);
		return $insert;
	}
	
	public function update_member(){

		$member_update_data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),				
			'address' => $this->input->post('address'),
			'about_me' => $this->input->post('about_me')				
		);
	
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$update = $this->db->update('user', $member_update_data);
		return $update;
	}
	
	public function update_pass(){

		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get('user');
		
		if($query->num_rows == 1){
			
			foreach ($query->result() as $row):
				$check=$row->password;
				break;			
			endforeach;

			if($check == md5($this->input->post('password'))){
				if($this->input->post('password2') == $this->input->post('password3')){
					$member_update_pass = array(
							'password' => md5($this->input->post('password2'))
					);
				
					$this->db->where('username', $this->session->userdata('username'));
					$update = $this->db->update('user', $member_update_pass);
					return $update;
				}					
			}																	
		}			
	}
                
    public function get_user($limlt,$start){

        $query=$this->db->get('user',$limlt,$start);
        return $query->result();
    }

    public function get_user_count(){

        $query=$this->db->get('user');
        return $query->num_rows;
    }
        
    public function get_friends(){

        $this->db->like('name', $this->session->userdata('friends_name'), 'after');
        $query=  $this->db->get('user');
        return $query->result();
    }

    public function get_followers($limlt,$start){

       $this->db->where('main_id',$this->session->userdata('user_id'));
        $this->db->like('name', $this->input->post('friends_name'), 'after');
        $query=  $this->db->get('friends',$limlt,$start);
        return $query->result();
    }

    public function get_followers_count(){

       $this->db->where('main_id',$this->session->userdata('user_id'));
        $this->db->like('name', $this->input->post('friends_name'), 'after');
        $query=  $this->db->get('friends');
        return $query->num_rows;
    }

    public function get_followers_ratings($follower_id){

    	$query = $this->db->query("select distinct food.name as fname, restaurant.name as rname, restaurant.address as address, restaurant.district as district, food_rating.user_rating as rating\n"
		. "from food_rating,restaurant_rating,food,restaurant,friends\n"
		. "where friends.follower_id={$follower_id} and food_rating.user_id={$follower_id} and food_rating.food_id=food.food_id and food.restaurant_id=restaurant.restaurant_id");
		
        return $query->result();

    }

    public function get_followers_ratings_count($follower_id){

        $query = $this->db->query("select distinct food.name as fname, restaurant.name as rname, restaurant.address as address, restaurant.district as district, food_rating.user_rating as rating\n"
        . "from food_rating,restaurant_rating,food,restaurant,friends\n"
        . "where friends.follower_id={$follower_id} and food_rating.user_id={$follower_id} and food_rating.food_id=food.food_id and food.restaurant_id=restaurant.restaurant_id");
        
        return $query->num_rows;

    }
                
    public function get_specific_user($user_id){

        $this->db->where('user_id', $user_id);
        $query=$this->db->get('user');
        return $query->result();
    }
        
    public function update_followers($follower_id){

        $query=  $this->get_specific_user($follower_id);
        foreach ($query as $value) :{
            $follower_name=$value->name;
            $address=$value->address;
        }
        endforeach;

        $update_followers = array(
	      'main_id' => $this->session->userdata('user_id'),
		  'follower_id' => $follower_id,
            'name' => $follower_name,
            'address' => $address
		);

	   $insert = $this->db->insert('friends', $update_followers);
	   return "follow";
    }
        
    public function delete_followers($follower_id){

        $this->db->where('main_id',$this->session->userdata('user_id'));
        $this->db->where('follower_id',$follower_id);
        $this->db->delete('friends');
    }
        
    public function check_friends($follower_id){

        $this->db->where('main_id',$this->session->userdata('user_id'));
        $this->db->where('follower_id',$follower_id);
        $query=$this->db->get('friends');
        if($query->num_rows()==1){
            return "follow";
        }
        else{
            return "unfollow";
        }
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

        $this->db->where('user_id',$this->session->userdata('user_id'));
        $this->db->update('user',$content);
        return;
    }
}