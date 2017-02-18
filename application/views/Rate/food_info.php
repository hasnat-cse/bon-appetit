<head>
    <script src="<?php echo base_url();?>search_rate/star.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/stars.css" />
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/search_info.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/RateIt/rateit.css" />
</head>
<body>
    <script src="<?php echo base_url();?>search_rate/RateIt/jquery.rateit.js"></script>
    <script type="text/javascript">
        $(function() {
            $('span.stars').stars();
        });
        function submitForm(){
            document.getElementById('ratingForm').submit();
        }
    </script>
<div id="info">
		
		<?php foreach ($food_info as $row): ?>
		<div class="img">	
		<img src="<?php echo base_url().'/'.$row['imglink']?>" height="460px" width="320px" alt="Profile Picture" />	
		</div>
	<div id="data">
			<table>		
				
				<tr>
					<td><?php echo 'Name:';?></td><td><?php echo $row['food'];?></td>
				</tr>
                                <tr>
					<td><?php echo 'Rating:'?></td><td><span class='stars'><?php echo $row['rating']; ?></span></td>
				</tr>
                                <tr>
                                    <td><?php echo 'Rating by:';?></td><td><?php echo $row['user_count']." users";?></td>
                                </tr>
                                <tr>													
					<td><?php echo 'My Rating:'?></td>
                                        <td>
                                            <form id="ratingForm" action="<?php echo site_url().'/rate/submit_foodRating/'.$row['food_id']; ?>" method="post" >
                                             <input type="range" name="rating" value="<?php echo $myrating;?>" step="0.5" id="backing4">
                                           <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false"  data-rateit-ispreset="true"
                                                data-rateit-min="0" data-rateit-max="5" onclick="submitForm()">
                                            </div>
                                            </form>
                                        </td>
				</tr>
                                <tr>
					<td><?php echo 'Restaurant:';?></td><td><?php echo $row['restaurant'];?></td>
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
           <a href="<?php echo site_url() . '/comments/food_comments/'.$row['food_id'];?>">Comments</a>	
       </div>
</div>
