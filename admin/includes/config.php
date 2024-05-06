<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "event_org";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

function active($currect_page)
{
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url)
    {
        echo 'active'; 
    } 
}
?>