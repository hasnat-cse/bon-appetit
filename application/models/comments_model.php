<?php

class Comments_model extends CI_Model {
        function get_foodComments_count($food_id){
             $query = $this->db->query("select blog_food_id from blog_food where food_id=$food_id");           
            return  $query->num_rows();
        }
	function get_foodComments($food_id,$start,$limit) {
                    $query = $this->db->query("select username,food.name as food,food.food_id as food_id,comment from blog_food,user,food where user.user_id=blog_food.user_id
                            and food.food_id=$food_id and blog_food.food_id=$food_id limit $start,$limit ");
		return $query->result_array();
	}
        function post_foodComment($food_id,$comment,$user_id){
            $query= $this->db->query("insert into blog_food(food_id,comment,user_id) values('{$food_id}','{$comment}','{$user_id}')");
        }
        function get_restaurantComments_count($restaurant_id){
            $query = $this->db->query("select blog_restaurant_id from blog_restaurant where restaurant_id=$restaurant_id");  
            return $query->num_rows();
        }
        function get_restaurantComments($restaurant_id,$start,$limit) {
                    $query = $this->db->query("select username,restaurant.name as restaurant,restaurant.restaurant_id as restaurant_id, comment from blog_restaurant,user,restaurant where user.user_id=blog_restaurant.user_id
                            and blog_restaurant.restaurant_id=$restaurant_id and restaurant.restaurant_id=$restaurant_id limit $start,$limit ");
		return $query->result_array();
	}
        function post_restaurantComment($restaurant_id,$comment,$user_id){
            $query= $this->db->query("insert into blog_restaurant(restaurant_id,comment,user_id) values('{$restaurant_id}','{$comment}','{$user_id}')");
        }
}
