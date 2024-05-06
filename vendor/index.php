<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventOrg</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:200">
   
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="icon" href="../img/core-img/favicon.ico">

 <!-- Core Style CSS -->
<link rel="stylesheet" href="../css/core-style.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../packages/image_uploader/image-uploader.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  
  <style>
        body {
            background-color: #212121;
            text-align: center;
        }

        .snip1578 {
            font-family: 'Open Sans', Arial, sans-serif;
            position: relative;
            display: inline-block;
            margin: 10px;
            min-width: 230px;
            max-width: 315px;
            width: 100%;
            color: #000;
            text-align: left;
            font-size: 16px;
            background :#2980b9
        }

        .snip1578 *,
        .snip1578:before,
        .snip1578:after {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .snip1578 img {
            max-width: 35%;
            margin-top: -15px;
            margin-left: 60%;
            margin-bottom: 15px;
            backface-visibility: hidden;
            vertical-align: top;
            border-radius: 5px;
        }

        .snip1578 figcaption {
            position: absolute;
            top: 0;
            right: 40%;
            left: 0;
            bottom: 0;
            padding: 15px;
        }

        .snip1578 h3 {
            margin: 0;
            font-size: 1.1em;
            font-weight: normal;
        }

        .snip1578 .icons {
            font-size: 1.6rem;
        }

        .snip1578 .icons a {
            color: #ccc;
        }

        .snip1578 .icons a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>


<?php
// Database connection details
$host = "localhost";
$dbname = "event_org";
$username = "root";
$password = "";

      
// Establish a database connection using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Function to fetch count from database
function fetchCount($pdo, $query) {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['count'] : 0;  // Check if result is not empty
}

// Query to fetch counts from the database







try {
    // Fetch counts
    include "includes/header.php";

    $queryServices = "SELECT COUNT(*) AS count FROM tbl_services WHERE vendor = '".$_SESSION["vendor_id"]."'";

    $queryOrders = "SELECT COUNT(*) AS count FROM tbl_orders WHERE vendor = '".$_SESSION["vendor_id"]."'";
    $servicesCount = fetchCount($pdo, $queryServices);
    $orderCount = fetchCount($pdo, $queryOrders);

    echo '<figure class="snip1578"  style="margin-left: 340px;margin-top: 110px;height: 115px ">
    <img src="../uploads/Designer (5).png" alt="profile-sample6" />
    <figcaption>
        <a href="servicedetail.php"> <h3 style="font-size: 2.1em;
        font-weight: normal;
    ">Services</h3></a>
        <div class="icons">
           
            <a href="servicedetail.php"  style=" font-size: x-large;">'.$servicesCount.'</a>
          
        </div>
    </figcaption>
</figure>

<figure class="snip1578 hover" style="height: 115px;
    margin-left: 77px;
    ">
    <img src="../uploads/Designer (1).png" alt="profile-sample5" />
    <figcaption>
    <a href="vendororder.php"> <h3 style="font-size: 2.1em;
        font-weight: normal;
    ">Orders</h3></a>
        <div class="icons">
          
            <a href="vendororder.php"  style="font-size: x-large;" >'.$orderCount.'</a>
          
        </div>
    </figcaption>
</figure>';


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>

<?php
include "includes/footer.php";
?>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(".hover").mouseleave(
        function () {
            $(this).removeClass("hover");
        }
    );

    
</script>

</body>
</html>
