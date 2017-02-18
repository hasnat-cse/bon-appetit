<ul id="nav1">
		<li><a class="hsubs" href="<?php if(!$this->session->userdata('is_logged_in')){echo site_url("home/index");} ?>"><p style="font-size:16px;">Home</p></a>
		</li>
		<li><a class="hsubs"  href="<?php echo site_url("admin/admin_area"); ?>"><p style="font-size:16px;">Admin</p></a>						
		</li>
		
		<li><a class="hsubs" href="<?php echo site_url("admin/add_food"); ?>"><p style="font-size:16px;">Add Food</p></a>						
		</li>
		<li><a class="hsubs" href="<?php echo site_url("admin/remove_food"); ?>"><p style="font-size:16px;">Remove Items</p></a>						
		</li>					
		
	   <li><?php 
	   			if($is_logged_in=$this->session->userdata('is_logged_in')){ ?>

	   				 <a class="hsubs" href="<?php echo site_url("admin/logout"); ?>"><p style="font-size:16px;">Logout</p></a>
	   				 
	   			<?php }  else {?>
	  		 <a class="hsubs" href="<?php echo site_url("admin/index"); ?>"><p style="font-size:16px;">Login</p></a>
			<?php } ?>			  
	   </li>			  
				   
	<div id="lavalamp">
	</div>
</ul>
