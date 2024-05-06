<?php
include "includes/header.php";
include "includes/functions.php";

$Service = getServiceDetails($conn, $_GET["s"]);
?>

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">

                                    <?php
                                        $ImageArray = explode(",",$Service["image"]);
                                        $ImageCount = 0;
                                        foreach ($ImageArray as $value) 
                                        {
                                            
                                            if($ImageCount == 0)
                                            {
                                                echo '<li class="active" data-target="#product_details_slider" data-slide-to="'.$ImageCount.'" style="background-image: url('.$value.')"></li>';
                                            }else{
                                                echo '<li data-target="#product_details_slider" data-slide-to="'.$ImageCount.'" style="background-image: url('.$value.')"></li>';
                                            }
                                            
                                            ++$ImageCount;
                                        }

                                    ?>
                                 
                                </ol>
                                <div class="carousel-inner">

                                    <?php
                                        $ImageArray = explode(",",$Service["image"]);
                                        $ImageCount = 0;
                                        foreach ($ImageArray as $value) 
                                        {
                                            
                                            if($ImageCount == 0)
                                            {
                                                echo '<div class="carousel-item active">
                                                <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                                    <img class="d-block w-100" src="'.$value.'" alt="First slide">
                                                </a>
                                            </div>';
                                            }else{
                                                echo '<div class="carousel-item">
                                                <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                                    <img class="d-block w-100" src="'.$value.'" alt="Second slide">
                                                </a>
                                            </div>';
                                            }
                                            
                                            ++$ImageCount;
                                        }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">$<?php echo $Service["price"] ?></p>
                                <a href="product-details.html">
                                    <h6><?php echo $Service["title"] ?></h6>
                                </a>
                             
                            </div>

                            <div class="short_overview my-5">
                                <p><?php echo $Service["desc"] ?></p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post">
                                
                            <?php
                                $CartStatus = checkItemsInCart($conn, $_SESSION["user_id"], $Service["id"]);
                                if($CartStatus)
                                {
                                    echo '<button type="button" name="removefromcart" onclick="remove_from_cart_v2(\''.$_SESSION["user_id"].'\',\''.$Service["id"].'\',\''.$Service["vendor"].'\',\''.$_GET["s"].'\')" class="btn amado-btn">Remove from cart</button>';

                                }else{
                                    echo '<button type="button" name="addtocart" onclick="add_to_cart_v2(\''.$_SESSION["user_id"].'\',\''.$Service["id"].'\',\''.$Service["vendor"].'\',\''.$_GET["s"].'\')" class="btn amado-btn">Add to cart</button>';

                                }
                            ?>
                            
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->


    <?php
include "includes/footer.php";
?>