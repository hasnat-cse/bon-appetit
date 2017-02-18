<ul id="nav1">
					<li><a class="hsubs" href="<?php echo site_url("home/index"); ?>"><p style="font-size:16px;">Home</p></a>
					</li>
					<li><a class="hsubs" href="<?php echo site_url("search/index"); ?>"><p style="font-size:16px;">Search</p></a>
						<ul class="subs">
							<li><a href="<?php echo site_url("search/food_items"); ?>">Search Food Items</a></li>	
							<li><a href="<?php echo site_url("search/restaurants"); ?>">Search Restaurants</a></li>														
						</ul>
					</li>
					
					<li><a class="hsubs" href="<?php echo site_url("rate/index"); ?>"><p style="font-size:16px;">Rate</p></a>
						<ul class="subs">
							<li><a href="<?php echo site_url("rate/food_items"); ?>">Rate Food Items</a></li>
							<li><a href="<?php echo site_url("rate/restaurants"); ?>">Rate Restaurants</a></li>							
						</ul>
					</li>
					<li><a class="hsubs" href="<?php echo site_url("comments/index"); ?>"><p style="font-size:16px;">Comments</p></a>
						<ul class="subs">
							<li><a href="<?php echo site_url("comments/food_items"); ?>">Food Comments</a></li>
							<li><a href="<?php echo site_url("comments/restaurants"); ?>">Restaurant Comments</a></li>							
						</ul>
					</li>					
					
				   <li><?php 
				   			if($is_logged_in=$this->session->userdata('is_logged_in')){ ?>

				   				 <a class="hsubs" href="<?php echo site_url("profile/index"); ?>"><p style="font-size:16px;"><?php echo $this->session->userdata('username');?></p></a>
				   				 <ul class="subs">
				   				 	<li><a href="<?php echo site_url("profile/get_profile"); ?>">Edit Profile</a></li>
				   				 	<li><a href="<?php echo site_url("profile/change_pass"); ?>">Change Password</a></li>					   				 
					   				 <li><a href="<?php echo site_url("profile/friends_rating"); ?>">Friends Ratings</a></li>
					   				 <li><a href="<?php echo site_url("profile/add_friends"); ?>">Follow Friends</a></li>
					   				 <li><a href="<?php echo site_url("login/logout"); ?>">Logout</a></li>
				   				 </ul>
				   				 
				   			<?php }  else {?>
				  		 <a class="hsubs" href="<?php echo site_url("login/index"); ?>"><p style="font-size:16px;">Login</p></a>
						<?php } ?>			  
				   </li>			  
				   
					<div id="lavalamp"></div>
</ul>