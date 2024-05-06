<?php
include "includes/header.php";
include "includes/functions.php";

$Categories = getCategories($conn);
?>
<div class="products-catagories-area clearfix">
                                <div class="amado-pro-catagory clearfix" style="margin-bottom:10px;">
                        <?php
                            foreach ($Categories as $value) 
                            {
                                echo '
                                    <div class="single-products-catagory clearfix" style="padding: 10px 10px 0px 0px;">
                                        <a href="events.php?c='.$value["id"].'">
                                            <img src="'.$value["image"].'" style="height: 250px;border-radius:15px;" alt="">
                                            <div class="hover-content">
                                                <div class="line"></div>
                                                <h4 style="color:white;">'.$value["dislay_name"].'</h4>
                                            </div>
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
        </div>
                                </div>
    </div>

  

<?php
include "includes/footer.php";
?>