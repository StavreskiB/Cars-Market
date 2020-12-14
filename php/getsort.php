<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

$q = intval($_GET['q']);

echo "<script type='text/javascript'>alert('Сите полиња мора да се пополнат!');</script>";

if($q == 1)
{
    require 'leftcars.php';
}

if($q == 2)
{
    require 'cheapest.php';
}

if($q == 3)
{
    require 'expensive.php';
}

if($q == 4)
{
    require 'latest.php';
}

?>