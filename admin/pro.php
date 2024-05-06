<?php


$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "event_org";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
include "includes/header.php";
include "../includes/functions.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a function to update the profile
    $newLastName = $_POST["new_last_name"];
    $newEmail = $_POST["new_email"];

    // Assuming you have a function to update the profile in your functions.php file
    updateAdminProfile($conn, $_SESSION["admin_id"], $_POST["new_last_name"], $_POST["new_email"]);
    // Redirect to the profile page after updating
   
  }
  try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }

// Query to fetch counts from the database
$queryUsers = "SELECT COUNT(*) AS count FROM tbl_users";
$queryVendors = "SELECT COUNT(*) AS count FROM tbl_vendor";
$queryservice = "SELECT COUNT(*) AS count FROM tbl_services";

$Profile = getAdminProfile($conn, $_SESSION["admin_id"]);
$userCount = fetchCount($pdo, $queryUsers);
$vendorCount = fetchCount($pdo, $queryVendors);

$servicesCount = fetchCount($pdo, $queryservice);



// Function to fetch count from database
function fetchCount($pdo, $query) {
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result ? $result['count'] : 0;  // Check if result is not empty
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans|Josefin+Slab|Lobster">
  <style>
    body {
      background:#f6f6f6;
    }

    .frame {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 491px;
      height: 400px;
      margin-top: -200px;
      margin-left: -200px;
      border-radius: 2px;
      box-shadow: .5rem .5rem 1rem rgba(0, 0, 0, 0.6);
      background:#60a5fa;
      color: #786450;
      font-family: 'Josefin slab', sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .flex {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .center {
      height: 299px;
    width: 717px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0.5rem 0.5rem 1rem rgba(0, 0, 0, 0.5);
    overflow: hidden;
    margin-left: 14px;
    }

    .profile {
      float: left;
      width: 200px;
      height: 320px;
      text-align: center;
    }

    .profile .image {
      position: relative;
      width: 80px;
      height: 70px;
      margin: 38px auto 0 auto;
    }

    .profile .image .circle-1,
    .profile .image .circle-2 {
      position: absolute;
      box-sizing: border-box;
      width: 76px;
      height: 76px;
      top: -3px;
      left: -3px;
      border-width: 1px;
      border-style: solid;
      border-color: #643a7a #643a7a #643a7a transparent;
      border-radius: 50%;
      transition: all 1.5s ease-in-out;
    }

    .circle-1 {
      animation: circle-1 2s;
    }

    @keyframes circle-1 {
      100% {
        transform: rotate(-360deg);
      }
    }

    .profile .image .circle-2 {
      width: 82px;
      height: 82px;
      top: -6px;
      left: -6px;
      border-color: #786450 transparent #786450 #786450;
      animation: circle 2s;
    }

    @keyframes circle {
      100% {
        transform: rotate(360deg);
      }
    }

    .profile .image img {
      display: block;
      border-radius: 50%;
      background: #F5E8DF;
    }

    .profile .image:hover {
      cursor: pointer;
    }

    .profile .image:hover .circle-1,
    .profile .image:hover .circle-2 {
      transform: rotate(360deg);
    }

    .profile .image:hover .circle-2 {
      transform: rotate(-360deg);
    }

    .profile .name {
      font-size: 2rem;
      margin-top: 20px;
    }

    .profile .job {
      font-size: 1.2rem;
      line-height: 15px;
    }

    svg {
      margin: 0 auto;
      overflow: hidden;
    }

    #wave {
      stroke-dasharray: 0 16 101 16;
      animation: moveTheWave 2400ms linear infinite;
    }

    @keyframes moveTheWave {
      0% {
        stroke-dashoffset: 0;
        transform: translate3d(0, 0, 0);
      }

      100% {
        stroke-dashoffset: -133;
        transform: translate3d(-90px, 0, 0);
      }
    }

    .profile .actions .btn {
      display: block;
      width: 80px;
      height: 30px;
      margin: 0 auto 10px auto;
      background: none;
      border: 2px solid transparent;
      font-size: 1.1rem;
      box-sizing: border-box;
      color: #643a7a;
    }

    .btn,
    .parameter {
      font-family: 'Josefin sans';
    }

    .profile .actions .btn:hover {
      cursor: pointer;
    }

    .hvr-underline-from-center {
      display: inline-block;
      vertical-align: middle;
      transform: perspective(1px) translateZ(0);
      box-shadow: 0 0 1px rgba(0, 0, 0, 0);
      position: relative;
      overflow: hidden;
    }

    .hvr-underline-from-center:before {
      content: "";
      position: absolute;
      z-index: -1;
      left: 51%;
      right: 51%;
      bottom: 0;
      background: #643a7a;
      height: 1px;
      transition-property: left, right;
      transition-duration: 0.3s;
      transition-timing-function: ease-out;
    }

    .hvr-underline-from-center:hover:before,
    .hvr-underline-from-center:focus:before,
    .hvr-underline-from-center:active:before {
      left: 0;
      right: 0;
    }

    .stats .box {
      box-sizing: border-box;
      width: 120px;
      height: 99px;
      background: #F5E8DF;
      text-align: center;
      padding-top: 28px;
      transition: all .4s ease-in-out;
      color: #643a7a;
    }

    .box1 {
      animation: bg .5s ease-in-out;
    }

    .box2 {
      animation: bg .8s ease-in-out;
    }

    .box3 {
      animation: bg 1.1s ease-in-out;
    }

    @keyframes bg {
      0% {
        transform: translate(8rem);
      }

      100% {
        transform: translate(0);
      }
    }

    .stats .box:hover {
      cursor: pointer;
      color: #fff;
    }

    .hvr-underline-from-right {
      display: inline-block;
      vertical-align: middle;
      transform: perspective(1px) translateZ(0);
      box-shadow: 0 0 1px rgba(0, 0, 0, 0);
      position: relative;
      overflow: hidden;
    }

    .hvr-underline-from-right:before {
      content: "";
      position: absolute;
      z-index: -1;
      left: 100%;
      right: 0;
      bottom: 0;
      background: #644e72;
      height: 99px;
      transition-property: left;
      transition-duration: 0.3s;
      transition-timing-function: ease-out;
    }

    .hvr-underline-from-right:hover:before,
    .hvr-underline-from-right:focus:before,
    .hvr-underline-from-right:active:before {
      left: 0;
    }

    .stats .box:nth-child(2) {
      margin: 1px 0;
    }

    .stats span {
      display: block;
    }

    .stats .value {
      font-size: 1.8rem;
      font-family: lobster;
    }

    .stats .parameter {
      font-size: 1rem;
      line-height: 1.2;
    }
  </style>
</head>

<body>

  <div class="frame flex">
    <div class="center" style="margin-left: 48px">

      <div class="profile">
        <div class="image" style="margin-right: 46px;">
          <div class="circle-1"></div>
          <div class="circle-2"></div>
          <img src="https://images.unsplash.com/photo-1536444894718-0021cbbeb45f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
            alt="Jessica Potter" width="70" height="70" >
        </div>
        <form action="" method="post">
                    <div class="name">
                        <input type="text" name="new_last_name"  style="width: 108%;
    height: 35px;
    margin-left: 66px;border-style: hidden;" value="<?php echo $Profile["last_name"]; ?>"
                            placeholder="Last Name">
                    </div>
                    <div class="job">
                        <input type="email" name="new_email" style="width: 108%;
    height: 35px;
    margin-left: 47px;border-style: hidden;" value="<?php echo $Profile["email"]; ?>"
                            placeholder="Email">
                    </div>
                      
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="30px" viewBox="5 0 80 60" style="margin-left: 29px;">
                            <path id="wave" fill="none" stroke="#262626" stroke-width="2" stroke-linecap="round"></path>
                        </svg>
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn hvr-underline-from-center" style="margin-right: 46px;">Update</button>
                    </div>
                </form>
        </div>
      </div>

      <div class="stats" style=" margin-right: 21px">
        <div class="box box1 hvr-underline-from-right">
          <span class="value"><?php echo $userCount; ?></span>
          <span class="parameter">Users</span>
        </div>
        <div class="box box2 hvr-underline-from-right">
          <span class="value"><?php echo $vendorCount; ?></span>
          <span class="parameter">Vendors</span>
        </div>
        <div class="box box3 hvr-underline-from-right">
          <span class="value"><?php echo $servicesCount; ?></span>
          <span class="parameter">Services</span>
        </div>
      </div>
    </div>
  </div>

  <script>
    const path = document.querySelector('#wave');
    const animation = document.querySelector('#moveTheWave');
    const m = 0.512286623256592433;

    function buildWave(w, h) {
      const a = h / 4;
      const y = h / 2;

      const pathData = [
        'M', w * 0, y + a / 2,
        'c',
        a * m, 0,
        -(1 - a) * m, -a,
        a, -a,
        's',
        -(1 - a) * m, a,
        a, a,
        's',
        -(1 - a) * m, -a,
        a, -a,
        's',
        -(1 - a) * m, a,
        a, a,
        's',
        -(1 - a) * m, -a,
        a, -a,

        's',
        -(1 - a) * m, a,
        a, a,
        's',
        -(1 - a) * m, -a,
        a, -a,
        's',
        -(1 - a) * m, a,
        a, a,
        's',
        -(1 - a) * m, -a,
        a, -a,
        's',
        -(1 - a) * m, a,
        a, a,
        's',
        -(1 - a) * m, -a,
        a, -a,
        's',
        -(1 - a) * m, a,
        a, a,
        's',
        -(1 - a) * m, -a,
        a, -a
      ].join(' ');

      path.setAttribute('d', pathData);
    }

    buildWave(90, 60);
  </script>

</body>

</html>
