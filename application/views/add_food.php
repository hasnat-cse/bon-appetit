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
    <form action="<?php echo site_url("admin/add_items"); ?>" method="post" >
            <table>                     
                <tr>
                    <td><input type="text" name="add_items" placeholder="Add Items" id="add_items" value=""/></td>                                 
                </tr>
                <tr>
                    <td><input type="submit" value="Add"></td>
                </tr>
            </table>
    </form>
</div>
 <div class="datagrid" style="width:30%">
		
            <table >		
                <thead>
                    <tr>
                        <th>Food Name</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($query as $row): 
                ?>
                        <tr>
                        <td><a href="<?php echo site_url('admin/food_edit/'.$row->food_id); ?>"><?php echo $row->name;?></a></td>  
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