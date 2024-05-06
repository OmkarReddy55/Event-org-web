<?php
include "../includes/config.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "Add_vendor"){
    try {

        $vendor_firstname	= addslashes((trim($_REQUEST['vendor_firstname'])));
        $vendor_lastname	= addslashes((trim($_REQUEST['vendor_lastname'])));
        $vendor_bussiness	= addslashes((trim($_REQUEST['vendor_bussiness'])));
        $vendor_email	    = addslashes((trim($_REQUEST['vendor_email'])));
        

        $VendorArray = array();
        $VendorArray["vendorname"]         = $vendor_firstname ." " . $vendor_lastname;
        $VendorArray["password"]           = '1234';
        $VendorArray["email"]              = $vendor_email;
        $VendorArray["bussines_name"]      = $vendor_bussiness;

        $columns = implode(", ",array_keys($VendorArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($VendorArray));
        $values  = implode("', '", $escaped_values);
        $AddNewUserQuery = "INSERT INTO tbl_vendor ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Vendor Added.";
       

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "reset_password"){

    try {
    
        $id		= addslashes((trim($_REQUEST['id'])));
        $password	= addslashes((trim($_REQUEST['vendor_password'])));
    
        $Query = "UPDATE tbl_vendor SET password = '$password', status = 'Active' WHERE vendor_id = $id";
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