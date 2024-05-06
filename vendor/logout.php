<?php
session_start();
unset($_SESSION["vendor_logged_in"]); 
unset($_SESSION["vendor_id"]); 
unset($_SESSION["vendor_name"]); 
unset($_SESSION["vendor_email"]); 

header('location:index.php');
?>