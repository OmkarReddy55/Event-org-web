<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

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
                <a href="index.html"><img src="img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php
                        if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true){ 
                        
                        echo '<li><a href="profile.php">Profile</a></li>';
                        echo '<li><a href="orders.php">My Orders</a></li>';

                        }
                    ?>
                   
                </ul>
            </nav>
            <?php
                if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true){ 
                                        
                    echo '<div class="amado-btn-group mt-30 mb-100">
                    <a href="loginstype.php" class="btn amado-btn mb-15" >Logout</a>
                    </div>';

                }else{
                    echo '<div class="amado-btn-group mt-30 mb-100">
                    <a href="login.php" class="btn amado-btn mb-15" >Login</a>
                    </div>';
                }
            ?>
           
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <?php
                    function getCartCount($conn, $user)
                    {
                        $Query = "SELECT COUNT(*) AS count FROM tbl_cart WHERE user = '$user'";
                    
                        $Results    = mysqli_query($conn,$Query);
                        $ListArray  = array();
                    
                        if (mysqli_num_rows($Results) > 0) 
                        {
                            while($record = mysqli_fetch_assoc($Results)) 
                            {
                                return $record["count"];
                            }
                    
                        }else{
                            return '0';
                        }
                    
                    }

                    $CartCount       = getCartCount($conn, isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '0');

                ?>
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $CartCount; ?>)</span></a>
            </div>
            
        </header>
        <!-- Header Area End -->