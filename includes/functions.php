<?php

function UploadImageFile($folder,$image){
    try 
    {
        $uploadDirectory = "../$folder/";
        $uploadURL       = $folder.'/';
        $image_file_path = "";

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $file_ext  =    pathinfo($_FILES["$image"]['name'], PATHINFO_EXTENSION);
        $file_name = $_FILES["$image"]["name"];
        $file_tmp  = $_FILES["$image"]["tmp_name"];
        $ext       = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif','PNG', 'jfif'])) {
            $newFileName = date("YmdHis") . "." . $file_ext;
            $uploadPath = $uploadDirectory . $newFileName;


            if (move_uploaded_file($file_tmp, $uploadPath)) {
                $image_file_path= $uploadURL . $newFileName;
            }
        }

        return $image_file_path;

    } catch (Exception $ex) {
        return "Upload Error : ".$ex->getMessage();
    }
}

function getAdminProfile($conn, $id){
    $GetEvents = "SELECT * FROM tbl_admin WHERE admin_id = '$id'";

    $Results    = mysqli_query($conn,$GetEvents);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["admin_id"];
            $data["first_name"]    = $record["first_name"];
            $data["last_name"]     = $record["last_name"];
            $data["user_name"]      = $record["adminname"];
            $data["email"]         = $record["email"];
           
            return $data;

        }

    }
}

function getCategories($conn){
    $Query = "SELECT * FROM tbl_categories";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["category_id"];
            $data["name"]          = $record["category_name"];
            $data["dislay_name"]   = $record["category_display_name"];
            $data["image"]         = $record["category_image"];

            array_push($ListArray,$data);

        }

    }
    return $ListArray;

}

function getSubCategories($conn, $id){
    $Query = "SELECT * FROM tbl_sub_category WHERE category_id = '$id'";

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

    }
    return $ListArray;

}

function getVendorProfile($conn, $id){
    $GetEvents = "SELECT * FROM tbl_vendor WHERE vendor_id = '$id'";

    $Results    = mysqli_query($conn,$GetEvents);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["vendor_id"];
            $data["first_name"]    = $record["first_name"];
            $data["last_name"]     = $record["last_name"];
            $data["user_name"]     = $record["vendorname"];
            $data["email"]         = $record["email"];
           
            return $data;

        }

    }
}

function getServicesByCategory($conn, $cid){
    $Query = "SELECT * FROM tbl_services WHERE category = '$cid'";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data                          = array();
            $data["id"]                    = $record["service_id"];
            $data["vendor"]                = $record["vendor"];
            $data["category"]              = $record["category"];
            $data["sub_category"]          = $record["sub_category"];
            $data["service_title"]         = $record["service_title"];
            $data["service_description"]   = $record["service_description"];
            $data["service_image"]         = $record["service_image"];
            $data["contact_email"]         = $record["contact_email"];
            $data["service_price"]         = $record["service_price"];

            array_push($ListArray,$data);

        }

    }
    return $ListArray;

}

function getServices($conn, $cid, $sid){
    $Query = "SELECT * FROM tbl_sub_category WHERE category_id = '$cid'";

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

    }
    return $ListArray;

}

function getUserProfile($conn, $id){
    $GetEvents = "SELECT * FROM tbl_users WHERE user_id = '$id'";

    $Results    = mysqli_query($conn,$GetEvents);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["user_id"];
            $data["first_name"]    = $record["first_name"];
            $data["last_name"]     = $record["last_name"];
            $data["user_name"]     = $record["username"];
            $data["email"]         = $record["email"];
           
            return $data;

        }

    }
}

function checkItemsInCart($conn, $user, $id)
{
    $Query = "SELECT * FROM tbl_cart WHERE user = '$user' AND service = '$id'";
    $Results    = mysqli_query($conn,$Query);

    if (mysqli_num_rows($Results) > 0) {
        return true;
    } else {
        return false;
    }
}

function getServiceDetails($conn, $id){
    $GetEvents = "SELECT * FROM tbl_services WHERE service_id = '$id'";

    $Results    = mysqli_query($conn,$GetEvents);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]            = $record["service_id"];
            $data["vendor"]        = $record["vendor"];
            $data["category"]      = $record["category"];
            $data["sub_c"]         = $record["sub_category"];
            $data["title"]         = $record["service_title"];
            $data["desc"]          = $record["service_description"];
            $data["image"]         = $record["service_image"];
            $data["email"]         = $record["contact_email"];
            $data["price"]         = $record["service_price"];

            return $data;

        }

    }
}

function getCartItems($conn, $user){
    $Query = "SELECT * FROM `tbl_cart`INNER JOIN tbl_services ON tbl_cart.service = tbl_services.service_id WHERE tbl_cart.user = '$user'";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["id"]         = $record["cart_id"];
            $data["title"]      = $record["service_title"];
            $data["image"]      = $record["service_image"];
            $data["price"]      = $record["service_price"];

            array_push($ListArray,$data);

        }

    }
    return $ListArray;
}

function getCartTotal($conn, $user){
    $Query = "SELECT * FROM `tbl_cart`INNER JOIN tbl_services ON tbl_cart.service = tbl_services.service_id WHERE tbl_cart.user = '$user'";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    $Cost = 0;

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
           
            $Cost      += (int) $record["service_price"];


        }

    }
    return $Cost;
}

function getVendorName($conn, $id){
    $Query = "SELECT * FROM tbl_vendor WHERE vendor_id = '$id'";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $name      = $record["vendorname"];
            return $name;
        }
    }
}

function getServiceName($conn, $id){
    $Query = "SELECT * FROM tbl_services WHERE service_id = '$id'";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $name      = $record["service_title"];
            return $name;
        }
    }
}

function getServiceImage($conn, $id){
    $Query = "SELECT * FROM tbl_services WHERE service_id = '$id'";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $Image      = $record["service_image"];
            $ImageArray = explode(",",$Image);
            return $ImageArray[0];
        }
    }
}

function getOrders($conn, $id){
    $Query = "SELECT * FROM tbl_orders WHERE user = '$id' ORDER BY order_id DESC";

    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["name"]          = getServiceName($conn,$record["service"]);
            $data["vendor"]        = getVendorName($conn,$record["vendor"]);
            $data["price"]         = $record["amount"];
            $data["status"]        = $record["status"];
            $data["image"]         = getServiceImage($conn,$record["service"]);

            array_push($ListArray,$data);
        }
    }

    return $ListArray;

}
function updateAdminProfile($conn, $adminId, $newLastName, $newEmail) {
    try {
        $updateQuery = "UPDATE tbl_admin SET last_name = '$newLastName', email = '$newEmail' WHERE admin_id = '$adminId'";
        mysqli_query($conn, $updateQuery);
        return true;
    } catch (Exception $ex) {
        return "Update Error: " . $ex->getMessage();
    }
}

function updateVendorProfile($conn, $vendorId, $newLastName, $newEmail) {
    try {
        $updateQuery = "UPDATE tbl_vendor SET first_name = '$newLastName', email = '$newEmail' WHERE vendor_id = '$vendorId'";
        mysqli_query($conn, $updateQuery);
        return true;
    } catch (Exception $ex) {
        return "Update Error: " . $ex->getMessage();
    }
}


?>