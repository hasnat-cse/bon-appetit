<?php
 error_reporting(E_ALL ^ E_DEPRECATED);   //exclude all php and mysql version error.
if(isset($_GET['format'] ) && intval($_GET['num']) && $_GET['api_key']=='arif_cse') {
 
//Set our variables
$format = strtolower($_GET['format']);
$num = intval($_GET['num']);
 
//Connect to the Database
$con = mysql_connect("localhost", "root", "") or die ('MySQL Error.');
mysql_select_db("bon_appetit",$con) or die('MySQL Error.');
 echo "<p>Arif</p>";
//Run our query
$result = mysql_query("SELECT * FROM restaurant ORDER BY `restaurant_id`",$con) or die('MySQL Error.');
 
//Preapre our output
if($format == 'json') {
$recipes = array();
while($recipe = mysql_fetch_array($result, MYSQL_ASSOC)) {
$recipes[] = array('post'=>$recipe);
}
 
$output = json_encode(array('posts' => $recipes));
 
} elseif($format == 'xml') {
 
header('Content-type: text/xml');
$outputÂ  = "<?xml version=\"1.0\"?>\n";
$output .= "<recipes>\n";
 
for($i = 0 ; $i < mysql_num_rows($result) ; $i++){
$row = mysql_fetch_assoc($result);
$output .= "<recipe> \n";
$output .= "<recipe_id>" . $row['restaurant_id'] . "</recipe_id> \n";
$output .= "<recipe_name>" . $row['restaurant_name'] . "</recipe_name> \n";
}
 
$output .= "</recipes>";
 
} else {
die('Improper response format.');
}
 
//Output the output.
echo $output;
 
}
 
?>