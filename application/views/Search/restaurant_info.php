<head>
    <script src="<?php echo base_url();?>search_rate/star.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/stars.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/search_info.css" />
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/search.css" />
</head>
<body>
    <script type="text/javascript">
        $(function() {
            $('span.stars').stars();
        });
    </script>
<div id="info">
		
		<?php foreach ($restaurant_info as $row): ?>
		<div class="img">	
		<img src="<?php echo base_url().'/'.$row['imglink']?>" height="460px" width="320px" alt="Profile Picture" />
		</div>
	<div id="data">
			<table>		
				
				<tr>
					<td><?php echo 'Name:';?></td><td><?php echo $row['restaurant'];?></td>
				</tr>
                                <tr>													
					<td><?php echo 'Rating:'?></td><td><span class='stars'><?php echo $row['rating']; ?></span></td>
				</tr>
                                <tr>
                                    <td><?php echo 'Rating by:';?></td><td><?php echo $row['user_count']." users";?></td>
                                </tr>	
				<tr>
					<td><?php echo 'Address:';?></td><td><?php echo $row['address'];?></td>
				</tr>
				<tr>
					<td><?php echo 'District:';?></td><td><?php echo $row['district'];?></td>					
				</tr>				
				<?php endforeach;?>
			</table>	
	</div>
       <div id="links">
        <a href="<?php echo site_url() . '/rate/restaurant_info/'.$row['restaurant_id'];?>">Rate it</a>
        </br>
        <a href="<?php echo site_url() . '/comments/restaurant_comments/'.$row['restaurant_id'];?>">Comments</a>	
       </div>
</div>
    
<div class="datagrid" style="margin-top:35%">
    <table>
        <thead>
            <tr>
                <th>Food</th>
                <th>Ratting</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($rest_foods){
                $i=1;
                foreach ($rest_foods as $food_item): ?>

                        <tr  <?php if(($i%2)==0) 
                                            {
                                                echo "class="."'"."alt"."'";   
                                            }
                                            $i++;
                                            ?>>
                            <td><a href="<?php echo site_url() . '/search/food_info/'.$food_item['food_id'];?>"><?php echo $food_item['name']; ?></a></td>
                            <td><span class='stars'><?php echo $food_item['rating']; ?></span></td>
                        </tr>
            <?php
                endforeach;
            }
            ?>
            </tbody>
        </table>
    </div>
    <div id="pagination">
        <p><?php echo $links; ?></p>
    </div>