<head>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/comments.css" />
</head>
<body>
    <div id="comments">
        <?php
         if($restaurant_comments){
             $i=0;
                foreach ($restaurant_comments as $row):
                    if($i==0){ ?>
                          <h3><a href="<?php echo site_url() . '/search/restaurant_info/'.$row['restaurant_id'];?>"><?php echo $row['restaurant'];?></a></h3> 
                        <?php
                        $i++; 
                        }?>

                       <p><?php echo "<span style='color: #aa4444;font-size:20px'>".$row['username'].": "."</span>"."<span style='color: #22aa11;font-size:18px'>".$row['comment']."</span>";?></p>
            <?php
                endforeach;
         }
         else{ ?>
                       <h4>No Comments</h4>
         <?php }
            if(isset($user_id)){  ?>
             <div id="postComment">
                 <form action="<?php echo site_url().'/comments/post_restaurantComment/'.$restaurant_id; ?>" method="post" >
                    <textarea name="comment" required></textarea>
                    </br>
                    <input type="submit" value="Post Comment">
                 </form>
             </div>
         <?php } ?>
    </div>
    <div id="pagination">
        <p><?php echo $links; ?></p>
    </div>
