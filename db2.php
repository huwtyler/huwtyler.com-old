<?php
	
$db = getenv ('DATABASE_HOST');
$db_user = getenv ('DATABASE_USER');
$db_pass = getenv ('DATABASE_PASS');
$db_name = 'db0ecnjs12gf06';

// Connecting, selecting database
$dbconn = pg_connect("host=$db dbname=$db_name user=$db_user password=$db_pass")
    or die('Could not connect: ' . pg_last_error());
    
// Performing SQL query
$query = 'SELECT * FROM vouchers WHERE store_id = 0';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// var_dump(pg_fetch_object($result));

echo $result['title'];
echo "<BR>";
echo $result['description'];
echo "<BR>";
echo "Expires: ".$result['expiry_date'];
echo "<BR>";

// Free resultset
pg_free_result($result);
  
// Closing connection
pg_close($dbconn);  


?>