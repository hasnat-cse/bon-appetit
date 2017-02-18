<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/search.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/stars.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/search.css" />
</head>
<body>
<?php if($search!='ratings'){
?>

<div id="search_form"> 
    <form action="<?php echo site_url("profile/friends_rating"); ?>" method="post" >
            <table>                     
                <tr>
                    <td><input type="text" name="friends_name" placeholder="Search Friends" id="friends_name" value=""/> </td>                                 
                </tr>
                <tr>
                    <td><input type="submit" value="Search"></td>
                </tr>
            </table>
    </form>
</div>

<?php }
    if($search=='friends'){ 
?>
    
<div class="datagrid">
        
            <table>     
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>                                    
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($query as $row): 
                ?>
                        <tr>
                            <td><a href="<?php echo site_url('profile/follower_ratings/'.$row->follower_id); ?>"><?php echo $row->name;?></a></td>
                            <td><?php echo $row->address;?></td>    
                        </tr>                                                                                       
                
                <?php endforeach;
                ?>
                </tbody>
            </table>
            
</div>

<div id="pagination">
        <p><?php echo $links; ?></p>
</div>
        
<?php }
    else if($search=='ratings'){
?>
    <div id="login_form">
		
		<?php foreach ($query_1 as $row): ?>
        <div class="ticker" style="margin-top: 10%">	
                    <img style="height: 100%;" src="<?php echo base_url()."$row->imglink"?>" alt="Profile Picture" />		
		</div>
        <?php endforeach;
                ?>
        <div class="datagrid" style="margin-left: 30%; position: absolute; margin-top: 15%;width: 90%">
        
            <table>     
                <thead>
                    <tr>
                        <th>Food</th>
                        <th>Restaurant</th>
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
                            <td><?php echo $row->fname;?></td>
                            <td><?php echo $row->rname;?></td>
                            <td><?php echo $row->address;?></td>
                            <td><?php echo $row->district;?></td>
                            <td><?php echo $row->rating;?></td>    
                        </tr>                                                                                       
                
                <?php endforeach;
                ?>
                </tbody>
            </table>
            
</div>

<div id="pagination">
        <p><?php echo $links; ?></p>
</div>
        </div>

<?php }
?>

