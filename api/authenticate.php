<?php
include "../includes/config.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "user_login"){
    try {

        $email		= strtolower(addslashes((trim($_REQUEST['user_email']))));
        $password	= addslashes((trim($_REQUEST['user_password'])));

        $CheckUserQuery = "SELECT * FROM tbl_users WHERE email = '$email'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                $verify = password_verify($password, $record["password"]); 

                if ($verify) { 
                    $_SESSION["user_logged_in"] =  true;
                    $_SESSION["user_id"]        =  $record["user_id"];
                    $_SESSION["user_name"]      =  $record["username"];
                    $_SESSION["user_email"]     =  $record["email"];

                    $ResponseArray["status"]  = "200";
                    $ResponseArray["message"] = "Login Successfull.";
                } else { 
                    $ResponseArray["status"]  = "300";
                    $ResponseArray["message"] = "Incorrect username or password.";
                } 
            }
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "vendor_login"){

    try {
        $vendor_email	= addslashes((trim($_REQUEST['vendor_email'])));
        $vendor_password	= addslashes((trim($_REQUEST['vendor_password'])));
    
      
        $CheckUserQuery = "SELECT * FROM tbl_vendor WHERE email = '$vendor_email' AND password = '$vendor_password' ";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                if($record["status"] == "Reset"){
                    $ResponseArray["cstatus"]        = $record["status"];
                    $ResponseArray["vendor_id"]      = $record["vendor_id"];
                    $ResponseArray["message"]        = "You have been redirected to reset your password.";
                }else if($record["status"] == "Blocked"){
                    $ResponseArray["cstatus"]  = $record["status"];
                    $ResponseArray["message"]  = "Your account has been blocked by admin. Please contact admin for more information.";
                }else{
                    $ResponseArray["cstatus"]     = $record["status"];
                    $_SESSION["vendor_logged_in"] = true;
                    $_SESSION["vendor_id"]        = $record["vendor_id"];
                    $_SESSION["vendor_name"]      = $record["vendorname"];
                    $_SESSION["vendor_email"]     = $record["email"];
                    $ResponseArray["message"]     = "Vendor Login Successfull.";
                }
               

            }

            $ResponseArray["status"]  = "200";
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }
        

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "admin_login"){
    try {

        $email		= strtolower(addslashes((trim($_REQUEST['admin_email']))));
        $password	= addslashes((trim($_REQUEST['admin_password'])));

        $CheckUserQuery = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password'";
        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) 
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {

                    $_SESSION["admin_logged_in"] =  true;
                    $_SESSION["admin_id"]        =  $record["admin_id"];
                    $_SESSION["admin_name"]      =  $record["adminname"];
                    $_SESSION["admin_email"]     =  $record["email"];

                    $ResponseArray["status"]  = "200";
                    $ResponseArray["message"] = "Login Successfull.";
              
            }
        } else {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "user_registration"){

    try {
        $email	    = addslashes((trim($_REQUEST['user_reg_email'])));
        $username	= addslashes((trim($_REQUEST['user_reg_name'])));

        $password	= addslashes((trim($_REQUEST['user_reg_password'])));
    
        $CheckEmailQuery = "SELECT * FROM tbl_users WHERE email = '$email'";
        $CheckEmailQueryResults = mysqli_query($conn,$CheckEmailQuery);
        if (mysqli_num_rows($CheckEmailQueryResults) > 0) 
        {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Email is already registered. Please provide a different email.";
        }else{
            $LoginArray = array();
            $LoginArray["email"]             = $email;
            $LoginArray["username"]          = $username;

            $password_hash = password_hash($password,PASSWORD_DEFAULT); 

            $LoginArray["password"]      = $password_hash;

            $columns = implode(", ",array_keys($LoginArray));
            $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($LoginArray));
            $values  = implode("', '", $escaped_values);
            $AddNewUserQuery = "INSERT INTO tbl_users ($columns) VALUES ('$values')";
            $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
            
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Registration Successfull.";
        }

        

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
   
}else{
    $ResponseArray["status"]  = "404";
    $ResponseArray["message"] = "Invalid Action.";
}

$Response	=	json_encode($ResponseArray, true);

echo $Response;
exit;
?>