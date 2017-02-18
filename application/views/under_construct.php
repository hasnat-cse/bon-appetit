<div id="login_form">
	
	<h1><?php echo $page; ?> is under Construction!!!</h1></br>
		
		
		<?php if($is_logged_in=$this->session->userdata('is_logged_in')){
		   				  echo anchor('login/logout', 'Sign Out');
		   			 }
		   				 ?>		   				 
</div>