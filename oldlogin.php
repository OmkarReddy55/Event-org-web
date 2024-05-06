<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background-image: url('img/org.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
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
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="New logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
       
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid"  style="    margin-left: 385px">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>UserLogin</h2>
                            </div>

                            <form autocomplete="off" id="user_login">
                                <input autocomplete="off" type="hidden" name="action"  value="user_login">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="email" class="form-control" name="user_email" id="user_email" value="" placeholder="Email Address" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="user_password" id="user_password" value="" placeholder="Password" autocomplete="off" required>
                                        
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    <button type="button" class="btn amado-btn w-100" id="bt_user_login">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Create Account</h2>
                            </div>

                            <form autocomplete="off" id="user_registration">
                                <input autocomplete="off" type="hidden" name="action"  value="user_registration">

                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" autocomplete="off" class="form-control" name="user_reg_name" id="user_reg_name" placeholder="name" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="reg_email" autocomplete="off" class="form-control" name="user_reg_email" id="user_reg_email" placeholder="Email Address" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" autocomplete="off" class="form-control" name="user_reg_password" id="user_reg_password" value="" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" autocomplete="off" class="form-control" id="user_reg_confirm_password" value="" placeholder="Confirm Password" required>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                    <button type="button" class="btn amado-btn w-100" id="bt_user_registration">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
  <!-- ##### Newsletter Area End ##### -->



    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>