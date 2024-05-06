<?php
include "includes/header.php";
include "../includes/functions.php";

$Profile = getAdminProfile($conn,$_SESSION["admin_id"]);


?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8" style="margin-left: 181px;">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2>My Profile</h2>
                            </div>
                            <form id="admin_profile">
                                <input type="hidden" name="action"  value="admin_profile">
                                <input type="hidden" name="id"  value="<?php echo $_SESSION["admin_id"]; ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="admin_firstname" id="admin_firstname" placeholder="First Name" value="<?php echo $Profile["first_name"]; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="admin_lastname" id="admin_lastname" placeholder="Last Name" value="<?php echo $Profile["last_name"]; ?>" required>
                                    </div>  
                                    <div class="col-12 mb-3">
                                        <input type="reg_email" class="form-control" name="admin_profile_email" id="admin_profile_email" placeholder="Email Address" value="<?php echo $Profile["email"]; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <button type="button" class="btn amado-btn w-100" 
                                        id="bt_admin_profile">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4" style="margin-top: 347px;
    margin-left: -587px;">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2>Change Password</h2>
                            </div>
                            <form id="my_profile_password">
                                <input type="hidden" name="action"  value="update_password">
                                <input type="hidden" name="id"  value="<?php echo $_SESSION["admin_id"]; ?>">
                                <input type="hidden" name="table"  value="admin">

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" name="update_password" id="update_password" placeholder="New Password" value="">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" id="update_cpassword" placeholder="Confirm New Password" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    <button type="button" class="btn amado-btn w-100" 
                                    id="bt_profile_password">Submit</button>
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