<?php
include "includes/header.php";

include "../includes/functions.php";

$Category = getCategories($conn);

?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2 style="margin-left: 245px;margin-top: -133px;">Add Service</h2>
                            </div>
                            <br>

                            <form id="add_service" style="margin-left: 147px;
">
                                <input type="hidden" name="action"  value="add_service">
                                <input type="hidden" name="id"  value="<?php echo $_SESSION["vendor_id"]; ?>">

                                <div class="row" style="margin-left: 128px;width: 601px;">
                                    <div class="col-md-6 mb-3">
                                        <select class="w-100" name="service_category" id="service_category">
                                            <option value="">Select Category...</option>
                                            <?php
                                                foreach ($Category as $value) 
                                                {
                                                    echo '<option value="'.$value["id"].'">'.$value["dislay_name"].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3" id="service_sub_category_holder">
                                      
                                    </div>  
                                   
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="service_title" id="service_title" placeholder="Service Title" value="">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <textarea type="text" class="form-control" name="service_description" id="service_description" rows="4" cols="50" placeholder="Service Description"></textarea>
                                    </div>

                                    <div class="col-12 mb-3 service-images">
                                        
                                    </div>

                                    <div class="col-6 mb-3">
                                        <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Contact Email" value="">
                                    </div>
                                   
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" name="service_cost" id="service_cost" value="" placeholder="Price" required>
                                    </div>
                                    <div class="row" style="margin-left: 3px;">
                                    <div class="col-md-4 mb-3">
                                    <button type="button" class="btn amado-btn w-100" 
                                    id="bt_add_service">Add New Service</button>
                                    </div>
                                </div>
                                </div>
                              
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
       
    </div>

    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <script src="../packages/image_uploader/image-uploader.js"></script>

    <script>
    $('.service-images').imageUploader({

      imagesInputName:'service_images',
      label:'Drag & Drop files here or click to browse'

    });

    </script>
<?php
include "includes/footer.php";
?>