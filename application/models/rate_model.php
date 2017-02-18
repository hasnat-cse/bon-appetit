<?php

class Rate_model extends CI_Model {
        function get_foodRating($food_id,$user_id){
            $rating=0;
             $query = $this->db->query("select user_rating from food_rating where food_id=$food_id and user_id=$user_id");           
            if($query->num_rows()== 1){
                    foreach ($query->result() as $value) :{
                        $rating=$value->user_rating;
                    }
                    endforeach;
             }
             return $rating;
        }
        function update_food($food_id){
            $query=$this->db->query("select count(user_id) as total_user,sum(user_rating) as total_rating from food_rating where food_id=$food_id");
            if($query->num_rows()== 1){
                    foreach ($query->result() as $value) :{
                        $total_user=$value->total_user;
                        $total_rating=$value->total_rating;
                    }
                    endforeach;
                $rating=$total_rating/$total_user;
                $this->db->query("update food set rating=$rating where food_id=$food_id"); 
                $this->db->query("update food set user_count=$total_user where food_id=$food_id"); 
             }
        }
        function update_foodRating($food_id,$rating,$user_id){
            if($this->get_foodRating($food_id,$user_id)>0){
                 $this->db->query("update food_rating set user_rating=$rating where food_id=$food_id and user_id=$user_id"); 
            }
            else{
                $this->db->query("insert into food_rating(food_id,user_rating,user_id) values('{$food_id}','{$rating}','{$user_id}')"); 
                
            }
            $this->update_food($food_id);
        }
        function get_restRating($restaurant_id,$user_id){
            $rating=0;
             $query = $this->db->query("select user_rating from restaurant_rating where restaurant_id=$restaurant_id and user_id=$user_id");           
            if($query->num_rows()== 1){
                    foreach ($query->result() as $value) :{
                        $rating=$value->user_rating;
                    }
                    endforeach;
             }
            return $rating;
        }
         function update_restaurant($restaurant_id){
            $query=$this->db->query("select count(user_id) as total_user,sum(user_rating) as total_rating from restaurant_rating where restaurant_id=$restaurant_id");
            if($query->num_rows()==1){
                    foreach ($query->result() as $value) :{
                        $total_user=$value->total_user;
                        $total_rating=$value->total_rating;
                    }
                    endforeach;
                $rating=$total_rating/$total_user;
                $this->db->query("update restaurant set rating=$rating where restaurant_id=$restaurant_id"); 
                $this->db->query("update restaurant set user_count=$total_user where restaurant_id=$restaurant_id"); 
             }
        }
        function update_restRating($restaurant_id,$rating,$user_id){
            if($this->get_restRating($restaurant_id,$user_id)>0){
                 $this->db->query("update restaurant_rating set user_rating=$rating where restaurant_id=$restaurant_id and user_id=$user_id"); 
            }
            else{
                $this->db->query("insert into restaurant_rating(restaurant_id,user_rating,user_id) values('{$restaurant_id}','{$rating}','{$user_id}')");
            }
            $this->update_restaurant($restaurant_id);
        }
}
