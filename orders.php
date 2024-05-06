<?php
include "includes/header.php";
include "includes/functions.php";

$Orders = getOrders($conn,$_SESSION["user_id"]);

?>

        <div class="order-table-area section-padding-100" style="position: relative;
    z-index: 1;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 calc(95% - 320px);
    flex: 0 0 calc(95% - 320px);
    width: calc(95% - 320px);
    max-width: calc(95% - 320px);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>My Orders</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive" style="overflow-x: hidden; outline: none;">
                                <thead style="width: 100%;display: block;">
                                    <tr style="display: flex;width: 100%;height: 40px;background-color: #f5f7fa;">
                                        <th style="width:20%"></th>
                                        <th style="width:20%">Name</th>
                                        <th style="width:20%">Vendor</th>
                                        <th style="width:20%">Price</th>
                                        <th style="width:20%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        foreach ($Orders as $value) 
                                        {
                                            echo '<tr>
                                            <td style="width:20%">
                                                <a href="#"><img style="height: 150px;width: 150px;" src="'.$value["image"].'" alt="Product"></a>
                                            </td>
                                            <td style="width:20%">
                                                <h5>'.$value["name"].'</h5>
                                            </td>
                                            <td style="width:20%">
                                                <span>'.$value["vendor"].'</span>
                                            </td>
                                            <td style="width:20%">
                                                <span>$'.$value["price"].'</span>
                                            </td>
                                            <td style="width:20%">
                                                <span>'.$value["status"].'</span>
                                            </td>
                                            </tr>';
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
   
<?php
include "includes/footer.php";
?>