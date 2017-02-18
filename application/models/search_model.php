<?php

class Search_model extends CI_Model {
        function get_food_count($food_name,$restaurant_name,$district,$rating){
             $query = $this->db->query("select food.name from food,restaurant where food.restaurant_id=restaurant.restaurant_id
                            and food.name like '%{$food_name}%' and restaurant.name like '%{$restaurant_name}%'
                            and restaurant.district like '%{$district}%' and food.rating>=$rating");           
            return  $query->num_rows();
        }
	function get_foods($food_name,$restaurant_name,$district,$rating,$start,$limit) {
                    $query = $this->db->query("select food_id,food.name as food,restaurant.name as restaurant,address, restaurant.restaurant_id
                            as restaurant_id,
                            district,food.rating as rating from food,restaurant where food.restaurant_id=restaurant.restaurant_id
                            and food.name like '%{$food_name}%' and restaurant.name like '%{$restaurant_name}%'
                            and restaurant.district like '%{$district}%'and food.rating>=$rating order by food.rating desc limit $start,$limit
                            ");
		return $query->result_array();
	}
        function get_specific_food($food_id){
                    $query =$this->db->query("select food_id,food.rating as rating, food.user_count as user_count,food.imglink as imglink,food.name as food,
                            restaurant.name as restaurant,address, district from food,restaurant
                            where food.restaurant_id=restaurant.restaurant_id and food_id={$food_id}");
		return $query->result_array();
	}
        function get_restaurant_count($restaurant_name,$district,$rating){
            $query = $this->db->query("select name from restaurant where name like '%{$restaurant_name}%'
                            and district like '%{$district}%' and rating>=$rating");
            return $query->num_rows();
        }
        function get_restaurants($restaurant_name,$district,$rating,$start,$limit) {
                    $query = $this->db->query("select restaurant_id, name as restaurant,address,
                            district,rating from restaurant where name like '%{$restaurant_name}%'
                            and district like '%{$district}%' and rating>=$rating order by rating desc limit $start,$limit");
		return $query->result_array();
	}
         function get_specific_restaurant($restaurant_id){
                    $query = $this->db->query("select restaurant_id,name as restaurant,address,
                            district, rating, user_count, imglink from restaurant where restaurant_id={$restaurant_id}");
		return $query->result_array();
	}
        function get_rest_foods_count($restaurant_id){
            $query = $this->db->query("select name
                            from food where restaurant_id=$restaurant_id");
            return $query->num_rows();
        }
        function get_rest_foods($restaurant_id,$start,$limit){
                    $query =$this->db->query("select food_id,rating,name from food
                            where restaurant_id=$restaurant_id order by rating desc limit $start,$limit");
		return $query->result_array();
	}
}
