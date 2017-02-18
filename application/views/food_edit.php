<!DOCTYPE html>
<html>
<head>
    <title>Bon Appetit</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <link href="<?php echo base_url();?>css/generic.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/layout.css" media="screen" charset=UTF-8>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/menu.css" media="screen" charset=UTF-8>
		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.css">
	
	

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css" media="screen" charset=UTF-8>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/alluser_1.css" media="screen" charset=UTF-8>
	<script src="<?php echo base_url();?>js/jquery.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.js"></script>
 <body>
   
  
 
   <div id="maincontainer">

		<div id="top_part">
			<div id="top_part_2">
				<div id="for_menu" style="padding-left:80%; width:85%">
				
					<div id="container">

						<?php include('menubar_admin.php'); ?>

					</div>
				</div>
			</div>
		</div>

	<div id="name_bar" style="margin-bottom:30px;">
		<div id="name_bar_text1" >
			Bon Appetit
		</div>
	</div>	

<div id="login_form_2">

	<?php foreach ($query as $row): ?>
		<div id="edit_ticker" style="margin-top:13%;">	
            <img style="height: 85%;" src="<?php echo base_url()."$row->imglink"?>" alt="Food Picture" />			
		</div>            
			
	<?php endforeach;?>

	<h1></br>		
	</h1>	
	
	<div id="login_form_head">	
		<h4>Name: </h4></br>		
	</div>
	
	<div id="login_form_tail">
	
		<?php foreach ($query as $row):?>
	
		<fieldset>
				<?php
	
				echo form_open('admin/update_food_info');echo"</br>";
				echo form_input('name', set_value('name', $row->name));echo"</br>";					
				echo form_submit('submit', 'Update Info');
                echo form_close(); 
				?>		
	
				<?php echo validation_errors(' <p> class="error" </p>') ?>
	
		</fieldset>
		<?php endforeach;?>
	</div>
     <div id="login_form_3" style="margin-top:30%;">
         <?php
                echo form_open_multipart('admin/change_food_pic'); 
                echo form_upload('userfile'); 
                echo form_submit('upload','   Submit'); 
                echo form_close(); 
         ?>
         
    </div>
</div>

</div>  
	
</body>
</html>