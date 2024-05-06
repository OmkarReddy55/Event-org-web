<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventOrg</title>
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

// Query to fetch user details from tbl_users
$sql = "SELECT * FROM tbl_orders";
try {
    // Prepare and execute the SQL query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // Fetch user details as an associative array
    $userDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<style>
    table {
        border-collapse: collapse;
        width: 71%;
        margin-top: -433px;
        margin-left: 352px;
        height: 60px;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
  </style>";

  include "includes/header.php";
  
  
  // Display user details in an HTML table
  echo "<h1 style='margin-top:65px;margin-left: 351px '>Order Details</h1>";
  echo "<table border='1' style='margin-top: 30px '>";
    echo "<tr><th>Order ID</th>
    <th>Amount</th>
         <th>Status</th>
         <th>Order date</th>
         </tr>";
         foreach ($userDetails as $user) {
        echo "<tr>";
        echo "<td>" . $user['order_id'] . "</td>";
        echo "<td>" . $user['amount'] . "</td>";
        echo "<td>" . $user['status'] . "</td>";
        echo "<td>" . $user['order_date'] . "</td>";

        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>
</body>
</html>
