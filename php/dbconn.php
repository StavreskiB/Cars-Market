<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");


if (!$connection = pg_connect ("host=localhost dbname=postgres user=postgres password=password")) {
	$error = error_get_last();
	echo "Connection failed. Error was: ". $error['message']. "\n";
} else {
	echo  "Connection successfully";
}
?>



