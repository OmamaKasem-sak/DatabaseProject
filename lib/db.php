<?php

$conn_string = "host=localhost port=5432 dbname=Odev2 user=postgres password=123123";
$db = pg_connect($conn_string);
//connect to a database named "test" on the host "sheep" with a username and password

if ($db) {
    //echo 'Connection attempt succeeded.';
} else {
    echo 'Connection attempt failed.';
}

?>