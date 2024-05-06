<?php
include "config.php";

if(!isset($_SESSION["vendor_logged_in"])){ 
    header('location:login.php');
}

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
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../packages/image_uploader/image-uploader.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .amado-nav {
            width: 70px;
            background: linear-gradient(to right, #36D1DC, #5B86E5);
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            overflow: hidden;
            transition: 0.5s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .amado-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .amado-nav ul li {
            margin: 10px 0;
            text-align: center;
        }

        .amado-nav ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .amado-nav ul li a i {
            font-size: 24px;
            margin-bottom: 5px;
            /* margin-left: 122px; */
        }

        .amado-nav ul li a:hover {
            background-color: #1a5276; /* Change this color as desired */
        }

        .amado-nav .logo {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .amado-nav .logo img {
            max-width: 108px;
        }

        .amado-btn-group {
            margin-top: auto; /* Push the logout button to the bottom */
            margin-bottom: 20px; /* Add some spacing */
        }

        .amado-btn-group a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .amado-btn-group a i {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .amado-btn-group a:hover {
            background-color: #1a5276; /* Change this color as desired */
        }

        .main-content-wrapper {
            margin-left: 70px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

            <!-- Amado Nav -->
            <nav class="amado-nav" style="width: 126px;"  >
                <div class="logo">
                    <a href="index.html"><img src="../img/logo-removebg-preview.png" alt=""></a>
                </div>
                <ul>
                    <li class="active"><a href="index.php" title="Home"><i class="fa fa-home"></i><span>Home</span></a></li>
                    <li><a href="service.php" title="My Service"><i class="fa fa-cogs"></i><span>My Service</span></a></li>
                    <li><a href="vendororder.php" title="My Orders"><i class="fa fa-shopping-basket"></i><span>My Orders</span></a></li>
                    <li><a href="pro1.php" title="Profile"><i class="fa fa-user"></i><span>Profile</span></a></li>
                
                    <li><div class="amado-btn-group">
                    <?php
                    if(isset($_SESSION["vendor_logged_in"]) && $_SESSION["vendor_logged_in"] == true){ 
                        echo '<a href="logout.php" ><i class="fa fa-sign-out"></i><span>Logout</span></a>';
                    } else {
                        echo '<a href="login.php" class="btn amado-btn mb-15" ><i class="fa fa-sign-in"></i><span>Login</span></a>';
                    }
                    ?>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>

        
        <!-- Rest of your HTML content goes here -->

    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- Include any additional scripts or libraries if needed -->

    </body>

</html>
