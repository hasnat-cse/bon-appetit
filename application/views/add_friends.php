<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/search.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/stars.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/search.css" />
</head>
<body>
<div id="search_form"> 
    <form action="<?php echo site_url("profile/search_friends"); ?>" method="post" >
            <table>                     
                <tr>
                    <td><input type="text" name="friends_name" placeholder="Search Friends" id="friends_name" value=""/></td>                                 
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
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($query as $row): 
                        if($search == 'no'){
                            if($row->username != $this->session->userdata('username')) {?>
                        <tr>
                            <td><a href="<?php echo site_url('profile/user_info/'.$row->user_id); ?>"><?php echo $row->name;?></a></td>
                                <td><?php echo $row->address;?></td>	
                        </tr>																						

                        <?php }}
                        else{?>
                           <tr>
                            <td><a href="<?php echo site_url('profile/user_info/'.$row->user_id); ?>"><?php echo $row->name;?></a></td>
                                <td><?php echo $row->address;?></td>	
                            </tr>
                        <?php }
                        endforeach;?>
                    </tbody>
            </table>           
			
</div>  
<div id="pagination">
        <p><?php echo $links; ?></p>
</div>
