<?php
include "../includes/config.php";
include "../includes/functions.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "add_category"){
    try {

        $name	        = addslashes((trim($_REQUEST['category_name'])));
        $image          = UploadImageFile("uploads",'category_name_image');

        $CategoryArray                               = array();
        $CategoryArray["category_name"]              = str_replace(" ", "_", strtolower($name));
        $CategoryArray["category_display_name"]      = ucwords(strtolower($name));
        $CategoryArray["category_image"]             = $image;

        $columns = implode(", ",array_keys($CategoryArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($CategoryArray));
        $values  = implode("', '", $escaped_values);
        $AddNewUserQuery = "INSERT INTO tbl_categories ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Category Added.";
       

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}else if(isset($Action) && $Action == "add_sub_category"){

    try {
    
        $category	        = addslashes((trim($_REQUEST['category'])));
        $sub_category_name	= addslashes((trim($_REQUEST['sub_category_name'])));

        $image          = UploadImageFile("uploads",'sub_category_name_image');

        $CategoryArray                               = array();
        $CategoryArray["category_id"]                   = $category;
        $CategoryArray["sub_category_name"]             = str_replace(" ", "_", strtolower($sub_category_name));
        $CategoryArray["sub_category_display_name"]     = ucwords(strtolower($sub_category_name));
        $CategoryArray["sub_category_image"]            = $image;

        $columns = implode(", ",array_keys($CategoryArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($CategoryArray));
        $values  = implode("', '", $escaped_values);
        $AddNewUserQuery = "INSERT INTO tbl_sub_category ($columns) VALUES ('$values')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        
        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Sub Category Added.";
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "get_sub_categories"){

    try {
    
        $category	        = addslashes((trim($_REQUEST['id'])));
       
        $Query = "SELECT * FROM tbl_sub_category WHERE category_id = '$category'";

        $Results    = mysqli_query($conn,$Query);
        $ListArray = array();

        if (mysqli_num_rows($Results) > 0) 
        {
            while($record = mysqli_fetch_assoc($Results)) 
            {
                $data = array();
                $data["id"]            = $record["sub_category_id"];
                $data["category"]      = $record["category_id"];
                $data["name"]          = $record["sub_category_name"];
                $data["dislay_name"]   = $record["sub_category_display_name"];
                $data["image"]         = $record["sub_category_image"];

                array_push($ListArray,$data);

            }
            $ResponseArray["status"]  = "200";
            $ResponseArray["data"] = $ListArray;
        }else{
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "No Sub Categories Found.";
        }

        
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_service"){

    try {
    
        $vendor	                = addslashes((trim($_REQUEST['id'])));
        $category	            = addslashes((trim($_REQUEST['service_category'])));
        $sub_category	        = addslashes((trim($_REQUEST['service_sub_category'])));
        $title	                = addslashes((trim($_REQUEST['service_title'])));
        $description	        = addslashes((trim($_REQUEST['service_description'])));
        $contact_email	        = addslashes((trim($_REQUEST['contact_email'])));
        $service_cost	        = addslashes((trim($_REQUEST['service_cost'])));

        $error              =   array();
        $extension          =   array("jpeg","jpg","png","gif");
        $uploadDirectory    =   "../uploads/";
        $uploadURL          =   'uploads/';
        $image_file_path    =   array();

        foreach($_FILES["service_images"]["tmp_name"] as $key=>$tmp_name) 
        {
            $file_name  =   $_FILES["service_images"]["name"][$key];
            $file_tmp   =   $_FILES["service_images"]["tmp_name"][$key];
            $file_ext   =   pathinfo($_FILES["service_images"]['name'][$key], PATHINFO_EXTENSION);
            $ext        =   pathinfo($file_name,PATHINFO_EXTENSION);
            
            if(in_array($ext,$extension)) 
            {
                $newFileName = uniqid("s_") . "." . $file_ext;
                $uploadPath = $uploadDirectory . $newFileName;

                if (move_uploaded_file($file_tmp, $uploadPath)) {
                    $image_path= $uploadURL . $newFileName;
                    array_push($image_file_path,$image_path);
                }
            }
            else {
                array_push($error,"$file_name");
            }
        }

        $ServiceArray                             = array();
        $ServiceArray["vendor"]                   = $vendor;
        $ServiceArray["category"]                 = $category;
        $ServiceArray["sub_category"]             = $sub_category;
        $ServiceArray["service_title"]            = $title;
        $ServiceArray["service_description"]      = $description;
        $ServiceArray["service_image"]            = implode(",",$image_file_path);
        $ServiceArray["contact_email"]            = $contact_email;
        $ServiceArray["service_price"]            = $service_cost;


        $columns = implode(", ",array_keys($ServiceArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($ServiceArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_services ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "New Service Added.";
        
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "add_to_cart"){

    try {
    
        $id	                = addslashes((trim($_REQUEST['id'])));
        $user	            = addslashes((trim($_REQUEST['user'])));
        $vendor	            = addslashes((trim($_REQUEST['vendor'])));
  

        $CartArray                           = array();
        $CartArray["user"]                   = $user;
        $CartArray["vendor"]                 = $vendor;
        $CartArray["service"]                = $id;
       
        $columns = implode(", ",array_keys($CartArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($CartArray));
        $values  = implode("', '", $escaped_values);
        $Query = "INSERT INTO tbl_cart ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Added to cart.";
        
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "remove_from_cart"){

    try {
    
        $id	                = addslashes((trim($_REQUEST['id'])));
        $user	            = addslashes((trim($_REQUEST['user'])));
        $vendor	            = addslashes((trim($_REQUEST['vendor'])));

        $Query = "DELETE FROM tbl_cart WHERE user = '$user' AND service = '$id'";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Removed form cart.";
        
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "remove_item"){

    try {
    
        $id	                = addslashes((trim($_REQUEST['id'])));
 

        $Query = "DELETE FROM tbl_cart WHERE cart_id = '$id'";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Removed form cart.";
        
    
    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "payment"){

    try {
    
        $user	                = addslashes((trim($_REQUEST['user'])));
        $payment_id	            = addslashes((trim($_REQUEST['payment_id'])));

        $GetItems = "SELECT * FROM `tbl_cart`INNER JOIN tbl_services ON tbl_cart.service = tbl_services.service_id WHERE tbl_cart.user = '$user'";

        $Results    = mysqli_query($conn,$GetItems);
        $ListArray = array();

        if (mysqli_num_rows($Results) > 0) 
        {
            while($record = mysqli_fetch_assoc($Results)) 
            {
                $data                    = array();
                $data["user"]            = $user;
                $data["service"]         = $record["service"];
                $data["vendor"]          = $record["vendor"];
                $data["amount"]          = $record["service_price"];
                $data["payment"]         = $payment_id;
                $data["status"]          = 'Paid';
                $data["order_date"]      = date('Y-m-d H:i:s');

                $columns = implode(", ",array_keys($data));
                $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($data));
                $values  = implode("', '", $escaped_values);
                $Query = "INSERT INTO tbl_orders ($columns) VALUES ('$values')";
                $ExecuteOwnerQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
        
            }

        }

        $Query = "DELETE FROM tbl_cart WHERE user = '$user'";
        $ExecuteQuery = mysqli_query($conn,$Query) or die ("Error in query: $Query. ".mysqli_error($conn));
       
        
    
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