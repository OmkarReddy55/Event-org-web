<?php
include "includes/header.php";
include "includes/functions.php";

$Items = getCartItems($conn,$_SESSION["user_id"]);
$Cost  = getCartTotal($conn,$_SESSION["user_id"]);
$TAX = (18 / 100) * $Cost;
$Total = $Cost + $TAX;
?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($Items as $value) 
                                    {
                                        $ImageArray = explode(",",$value["image"]);

                                        echo '<tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="'.$ImageArray[0].'" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>'.$value["title"].'</h5>
                                        </td>
                                        <td class="price">
                                            <span>$'.$value["price"].'</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <div class="quantity">
                                                    <a href="javascript:void(0)" onclick="remove_item(\''.$value["id"].'\')" class="btn amado-btn" style="display: inline-block;height: 32px;border: none;border-radius: 0;background-color: #fff;font-weight: 400;min-width: 60px;  padding: 0px;font-size: 30px;line-height: 0px;color: red;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                   
                                                </div>
                                            </div>
                                        </td>
                                        </tr>';
                                    }
                                ?>
                                
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$<?php echo $Cost; ?></span></li>
                                <li><span>GST:</span> <span>$<?php echo $TAX; ?></span></li>
                                <li><span>total:</span> <span>$<?php echo $Total; ?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="javascript:void(0)" onclick="pay_now()" class="btn amado-btn w-100">Pay Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">
        function pay_now()
        {
            var total = "<?php echo $Total; ?>";
            var name          = ""; 
            var amount        = total; 
            var actual_amount = parseInt(total) * 100;
            var description   = "EventOrg"; 
  

            var options = {
                "key": "rzp_test_U2XWpODmhRkL0l", 
                "amount": actual_amount, 
                "currency": "INR",
                "name": name,
                "description": description,
                "image": "", 
                "handler": function (response){

                    $.ajax({
                        url: 'api/common.php',
                        'type': 'POST',
                        'data': {
                            'action': 'payment',
                            'user': "<?php echo $_SESSION["user_id"]; ?>", 
                            'payment_id':response.razorpay_payment_id,
                            'amount':actual_amount,
                            'total':amount,
                        },
                        success:function(data){
                            console.log(data);
                            window.location.href = 'orders.php'; 
                        }

                    });

                },
            };

            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response){
                    alert(response.error.code);
                    alert(response.error.description);
                    alert(response.error.source);
                    alert(response.error.step);
                    alert(response.error.reason);
                    alert(response.error.metadata.order_id);
                    alert(response.error.metadata.payment_id);
            });

            rzp1.open();
        }
    </script>
<?php
include "includes/footer.php";
?>