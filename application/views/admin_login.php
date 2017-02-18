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

    <h1>Log In</h1>
    <div style="margin-left: 20%;margin-top: 20px;">

            <legend>
		      <?php echo form_open('admin/validate_credentials');echo"</br>";?>
                <input type="text" placeholder="  Username" name="username"/></br></br>
                <input type="password" placeholder="  ********" name="password"/></br></br>
                <input type="submit" name="submit" value="Login"/>        
                <?php echo anchor('admin/signup', 'Create Admin'); ?>        
            </legend>

        </div>
</div>
</div>  
    
</body>
</html>