

<?php
include "../includes/config.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "admin_profile"){
    try {

        $first_name		    = addslashes((trim($_REQUEST['admin_firstname'])));
        $last_name	        = addslashes((trim($_REQUEST['admin_lastname'])));
        $email  	        = addslashes((trim($_REQUEST['admin_profile_email'])));
        $id  	            = addslashes((trim($_REQUEST['id'])));

        $Query = "UPDATE tbl_admin SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE admin_id = $id";

        $Results = mysqli_query($conn,$Query);

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Profile Updated.";
       

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "vendor_profile"){
    try {

        $first_name		    = addslashes((trim($_REQUEST['admin_firstname'])));
        $last_name	        = addslashes((trim($_REQUEST['admin_lastname'])));
        $email  	        = addslashes((trim($_REQUEST['admin_profile_email'])));
        $id  	            = addslashes((trim($_REQUEST['id'])));

        $Query = "UPDATE tbl_vendor SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE vendor_id = $id";

        $Results = mysqli_query($conn,$Query);

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Profile Updated.";
       

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "user_profile"){
    try {

        $first_name		    = addslashes((trim($_REQUEST['admin_firstname'])));
        $last_name	        = addslashes((trim($_REQUEST['admin_lastname'])));
        $email  	        = addslashes((trim($_REQUEST['admin_profile_email'])));
        $id  	            = addslashes((trim($_REQUEST['id'])));

        $Query = "UPDATE tbl_users SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE user_id = $id";

        $Results = mysqli_query($conn,$Query);

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Profile Updated.";
       

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "update_password"){

    try {
    
        $table  	        = addslashes((trim($_REQUEST['table'])));
        $password  	        = addslashes((trim($_REQUEST['update_password'])));
        $id  	            = addslashes((trim($_REQUEST['id'])));

        if($table == "admin")
        {
            $Query = "UPDATE tbl_admin SET password = '$password' WHERE admin_id = $id";
        }else if($table == "vendor"){
            $Query = "UPDATE tbl_vendor SET password = '$password' WHERE vendor_id = $id";
        }else{
            $password_hash = password_hash($password,PASSWORD_DEFAULT); 

            $Query = "UPDATE tbl_users SET password = '$password_hash' WHERE user_id = $id";
        }
       

        $Results = mysqli_query($conn,$Query);

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Password Updated.";
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else{
    $ResponseArray["status"]  = "404";
    $ResponseArray["message"] = "Invalid Action.";
}

$Response	=	json_encode($ResponseArray, true);

echo $Response;
exit;
?>