<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/search.css" />
</head>

<div id="login_form">
		
		<?php foreach ($query as $row): ?>
		
		<div class="ticker">	
                    <img style="height: 100%;" src="<?php echo base_url()."$row->imglink"?>" alt="Profile Picture" />		
		</div>
    
    <div class="datagrid" style="margin-left: 30%;margin-top: 10%;">
<!--            <h3>-->
			<table style="text-align: center; font: 30px/150% Verdana,Arial,Helvetica,sans-serif">		
                <tbody>
				<tr>
					<td><?php echo 'Name: '; echo $row->name;?></td>
				</tr>
                <tr>
					<td><?php echo 'Email: '; echo $row->email;?></td>
				</tr>
				<tr>
					<td><?php echo 'Address: '; echo $row->address;?></td>
				</tr>
				<tr>
					<td><?php echo 'About: '; echo $row->about_me;?></td>					
				</tr>								
                </tbody>
			</table>
		<!--</h3>-->
			
	</div>

	<?php endforeach;?>	
	
</div>