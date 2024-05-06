<?php
include "includes/header.php";
include "includes/functions.php";

$SubCategory = getSubCategories($conn,$_GET["c"]);
$Service = getServicesByCategory($conn,$_GET["c"]);
?>

        <div class="shop_sidebar_area">

            <div class="widget catagory mb-50">
                <h6 class="widget-title mb-30">Catagories</h6>

                <div class="catagories-menu">
                    <ul>
                        <?php
                            foreach ($SubCategory as $value) 
                            {
                                echo ' <li><a href="#">'.$value["dislay_name"].'</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>

        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
                <div class="row" id="event-container">
                    <?php
                        foreach ($Service as $value) 
                        {
                            echo '<div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <div class="product-img">';

                            $ImageArray = explode(",",$value["service_image"]);

                            $CartStatus = checkItemsInCart($conn, $_SESSION["user_id"], $value["id"]);

                            echo '<img src="'.$ImageArray[0].'" alt="">';

                                echo '</div>
    
                                <div class="product-description d-flex align-items-center justify-content-between">
                                    <div class="product-meta-data">
                                        <div class="line"></div>
                                        <p class="product-price">$'.$value["service_price"].'</p>
                                        <a href="event-details.php?s='.$value["id"].'">
                                            <h6>'.$value["service_title"].'</h6>
                                        </a>
                                    </div>
                                    <div class="ratings-cart text-right">
                                        <div class="cart">';
                                        
                                        if($CartStatus)
                                        {
                                            echo '<a href="javascript:void(0)" onclick="remove_from_cart(\''.$_SESSION["user_id"].'\',\''.$value["id"].'\',\''.$value["vendor"].'\',\''.$_GET["c"].'\')" data-toggle="tooltip" data-placement="left" title="Remove form cart"><img src="img/core-img/remove_form_cart.png" alt=""></a>';
                                        }else{
                                            echo '<a href="javascript:void(0)" onclick="add_to_cart(\''.$_SESSION["user_id"].'\',\''.$value["id"].'\',\''.$value["vendor"].'\',\''.$_GET["c"].'\')" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/add_to_cart.png" alt=""></a>';
                                        }
                                            

                                        echo '</div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                    ?>
                  

                
                </div>

               
            </div>
        </div>
    </div>
    
    <?php
include "includes/footer.php";
?>

  