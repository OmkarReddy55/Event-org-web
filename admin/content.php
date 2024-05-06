<?php
include "includes/header.php";
include "../includes/functions.php";

$Category = getCategories($conn);


?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6" style="margin-left:345px;">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2 style="margin-left: 192px;">Add New Category</h2>
                            </div>
                            <form id="new_category" style="border-style: groove; width: 113%; margin-left: 21px;">
                                <input type="hidden" name="action"  value="add_category">

                                <div class="row">
                                    
                                    <div class="col-12 mb-3">
                                        <input type="test" class="form-control" name="category_name" id="category_name" placeholder="Category Name" value="" style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 12px;  width: 96%; ">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="file" name="category_name_image" class="w-100" id="category_name_image" style="margin-left: 13px" >
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <button type="button" class="btn amado-btn w-100" 
                                        id="bt_add_category" style="margin-left:205px;">Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6" style="margin-top:100px;margin-left: 345px">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2 style="margin-left: 173px;">Add New Sub Category</h2>
                            </div>
                            <form id="add_sub_category" style="border-style: groove; width: 113%; margin-left: 21px;">
                                <input type="hidden" name="action"  value="add_sub_category">
                   
                                <div class="row">
                                    <div class="col-12 mb-3" style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 28px;max-width:85%;">
                                        <select class="w-100" name="category" id="category" style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 28px;max-width:85%;">
                                            <option value=""  >Select Category...</option>
                                            <?php
                                                foreach ($Category as $value) 
                                                {
                                                    echo '<option value="'.$value["id"].'">'.$value["dislay_name"].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="test" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Sub Category Name" value="" style="border-style: solid; border-width: thin;margin-top: 20px; margin-left: 12px ">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="file" name="sub_category_name_image" class="w-100" id="sub_category_name_image" style="margin-left:15px">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <button type="button" class="btn amado-btn" 
                                        id="bt_add_sub_category" style="    margin-left: 229px ;">Add Sub Category</button>
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
<style>
    .col-12 {
        max-width: 90%;
    }
    </style>
