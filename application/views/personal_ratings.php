<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/search.css" />
</head>
<body>
<div id="search_form"> 
    <form action="<?php echo site_url("profile/personal_ratings"); ?>" method="post" >
            <table>                     
                <tr>
                    <td><input type="text" name="food_name" placeholder="Search Food" id="food_name" value=""/></td>                                 
                </tr>
                <tr>
                    <td><input type="submit" value="Search"></td>
                </tr>
            </table>
    </form>
</div>
 <div class="datagrid">
		
            <table>		
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Ratings</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($query as $row): 
                 ?>
                        <tr>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->address;?></td>
                            <td><?php echo $row->district;?></td>
                            <td><?php echo $row->rating;?></td>
                        </tr>
                        
                        <?php 
                        endforeach;?>
                    </tbody>
            </table>
			
</div>  
