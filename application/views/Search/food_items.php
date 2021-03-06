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
    <form action="<?php echo site_url("search/food_items"); ?>" method="post" >
            <table>
                <tr>
                <td><h4>Food</h4></td>
                <td><h4>Restaurant</h4></td>
                <td><h4>District</h4></td>
                <td><h4>Min Rating</h4></td>
                </tr>       
                <tr>
                <td><input type="text" name="food_name" id="food_name" value="<?php echo $food_name; ?>"/></td>
                <td><input type="text" name="restaurant_name" id="restaurant_name" value="<?php echo $restaurant_name; ?>"/></td>
                 <td><input type="text" name="district" id="district" value="<?php echo $district; ?>"/></td>
                 <td><select name="rating">
                         <option value="0">All</option>
                         <option value="1">1 star</option>
                         <option value="2">2 stars</option>
                         <option value="3">3 stars</option>
                         <option value="4">4 stars</option>
                         <option value="5">5 stars</option>
                     </select>
                 </td>
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
                <th>Ratting</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($foods){
                $i=1;
                foreach ($foods as $food_item): ?>

                        <tr  <?php if(($i%2)==0) 
                                            {
                                                echo "class="."'"."alt"."'";   
                                            }
                                            $i++;
                                            ?>>
                            <td><a href="<?php echo site_url() . '/search/food_info/'.$food_item['food_id'];?>"><?php echo $food_item['food']; ?></a></td>
                            <td><a href="<?php echo site_url() . '/search/restaurant_info/'.$food_item['restaurant_id'];?>"><?php echo $food_item['restaurant']; ?></td>
                            <td><?php echo $food_item['address']; ?></td>
                            <td><?php echo $food_item['district']; ?></td>
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