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
<div id="login_form">
    
    <legend style="height:75%; width:40%; margin-left:20%; margin-top:10%;">
	<?php

	echo form_open('admin/create_admin');echo"</br>";?>                         
                 <input type="text" placeholder="  username" name="username"/></br>
                 <input type="text" placeholder="  email@dotcom" name="email"/></br>                         
                 <input type="password" placeholder="  password" name="password"/></br>
                 <input type="password" placeholder="  retype password" name="password2"/></br>
                 <input type="submit" name="submit" value="Create Account"/>
                
              </legend>
    <p><?php echo validation_errors() ?></p>
	
</div>

</div>  
    
</body>
</html>