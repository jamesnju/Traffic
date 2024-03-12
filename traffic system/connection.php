<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "stfms";

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$con){
    echo "Connection Failed!";
}

?>