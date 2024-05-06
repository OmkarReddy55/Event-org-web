<!DOCTYPE html>
<html lang="en">


<style>
    body {
        background-image: url('../img/org.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Eventorg</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
   

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix" style="justify-content:center;">




        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2 style="text-align: center;">Admin Login</h2>
                            </div>

                            <form id="admin_login">
                              <input type="hidden" name="action"  value="admin_login">

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="email" class="form-control" name="admin_email" id="admin_email" value="" placeholder="Email Address" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="password" class="form-control" name="admin_password" id="admin_password" value="" placeholder="Password" required>
                                    </div>  
                                    <div class="col-md-4 mb-3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <button type="button" class="btn amado-btn w-100" id="bt_admin_login">Login</button>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout_details_area mt-50 clearfix">
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

 

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../js/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
    <script src="../js/custom.js"></script>

</body>

</html>