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

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);
  
// Closing connection
pg_close($dbconn);  

echo "<br>1";

?>