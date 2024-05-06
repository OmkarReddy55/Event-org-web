<?php
include "includes/header.php";
?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8" style="    margin-left: 148px;">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2 style="margin-left: 382px;">Add Vendor</h2>
                            </div>

                            <form id="Add_vendor" style="border-style: groove; width: 113%; margin-left: 21px;">
                                <input type="hidden" name="action"  value="Add_vendor">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="vendor_firstname" id="vendor_firstname" value="" placeholder="firstname" required style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 12px ">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="vendor_lastname" id="vendor_lastname" value="" placeholder="lastname" required style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 12px;    width: 94%;">
                                    </div>  
                                   
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="vendor_bussiness" id="vendor_bussiness" placeholder=" Vendor Bussiness Name" value="" style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 12px;    width: 97%; ">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="reg_email" class="form-control" name="vendor_email" id="vendor_email" placeholder="Email Address" value="" style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 12px;  width: 97%; ">
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    <button type="button" class="btn amado-btn w-100" 
                                    id="bt_Add_Vendor" style="margin-left:272px;">Add Vendor</button>
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
