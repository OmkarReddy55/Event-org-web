<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventOrg</title>
    <link rel="icon" href="../img/core-img/favicon.ico">
    <!-- Core Style CSS -->
<link rel="stylesheet" href="../css/core-style.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../packages/image_uploader/image-uploader.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  
</head>
<body>


<?php
include "includes/header.php";
include "../includes/functions.php";

$Profile = getVendorProfile($conn,$_SESSION["vendor_id"]);


?>

        
                    </div>
                    <div class="col-12 col-lg-4" style="margin-left:384px;">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2 style =" margin-left: 104px">Change Password</h2>
                            </div>
                            <form id="my_profile_password" style="border-style: groove; width: 113%; margin-left: 21px;">
                                <input type="hidden" name="action"  value="update_password">
                                <input type="hidden" name="id"  value="<?php echo $_SESSION["vendor_id"]; ?>">
                                <input type="hidden" name="table"  value="vendor">

                                <div class="row" style="    width: 102%;">
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" name="update_password" id="update_password" placeholder="New Password" value="" style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 12px ">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" id="update_cpassword" placeholder="Confirm New Password" value="" style="border-style: solid;border-width: thin;margin-top: 20px;margin-left: 12px ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    <button type="button" class="btn amado-btn w-100" 
                                    id="bt_profile_password" style="margin-left: 141px;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "includes/footer.php";
?>
    
    </body>
</html>