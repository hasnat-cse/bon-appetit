<!DOCTYPE html>
<html>
<head>
    <title>Bon Appetit</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <link href="<?php echo base_url();?>css/generic.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/search.css" />
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
 <!-- ********************************************************** -->
<div id="search_form"> 
    <form action="<?php echo site_url("admin/search_items"); ?>" method="post" >
            <table>                     
                <tr>
                    <td><input type="text" name="remove_items" placeholder="Remove Items" id="remove_items" value=""/></td>                                 
                </tr>
                <tr>
                    <td><input type="submit" value="Search"></td>
                </tr>
            </table>
    </form>
</div>
 <div class="datagrid" style="width:30%">
		
            <table >		
                <thead>
                    <tr>
                        <th>Food Name</th>                        
                        <th>Option</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($query as $row): 
                ?>
                        <tr>
                        <td><?php echo $row->name;?></td>  
                        <td><a href="<?php echo site_url('admin/remove_food_items/'.$row->food_id); ?>">Remove</a></td>  
                       </tr>				                        
                <?php 
                    endforeach;
                ?>
                    </tbody>
            </table>
			
</div>
<!-- *************************************************************** -->
</div>  
	
</body>
</html>