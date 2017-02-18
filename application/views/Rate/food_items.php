<head>
    <script src="<?php echo base_url();?>search_rate/star.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/stars.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>search_rate/search.css" />
</head>
<body>
    <script type="text/javascript">
        $(function() {
            $('span.stars').stars();
        });
    </script>
    <div id="search_form">
    <form action="<?php echo site_url("rate/food_items"); ?>" method="post" >
            <table>
                <tr>
                <td><h4>Food</h4></td>
                <td><h4>Restaurant</h4></td>
                <td><h4>District</h4></td>
                </tr>       
                <tr>
                <td><input type="text" name="food_name" id="food_name" value="<?php echo $food_name; ?>"/></td>
                <td><input type="text" name="restaurant_name" id="restaurant_name" value="<?php echo $restaurant_name; ?>"/></td>
                 <td><input type="text" name="district" id="district" value="<?php echo $district; ?>"/></td>
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
                <th>Food</th>
                <th>Restaurant</th>
                <th>Address</th>
                <th>District</th>
                <th>My Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($foods){
                $i=1;
                $rating_count=0;
                foreach ($foods as $food_item): ?>
                        <tr  <?php if(($i%2)==0) 
                                            {
                                                echo "class="."'"."alt"."'";   
                                            }
                                            $i++;
                                            ?>>
                            <td><a href="<?php echo site_url() . '/rate/food_info/'.$food_item['food_id'];?>"><?php echo $food_item['food']; ?></a></td>
                            <td><a href="<?php echo site_url() . '/rate/restaurant_info/'.$food_item['restaurant_id'];?>"><?php echo $food_item['restaurant']; ?></td>
                            <td><?php echo $food_item['address']; ?></td>
                            <td><?php echo $food_item['district']; ?></td>
                             <td>
                               <span class='stars'><?php echo $myrating[$rating_count++]; ?></span>
                            </td>
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