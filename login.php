<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Title  -->
  <title>Eventorg</title>

  <!-- Favicon  -->
  <link rel="icon" href="img/core-img/favicon.ico">


  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden; /* Hide overflowing content */
    }

    /* Video container */
    #video-background {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1;
    }

    .btn {
      padding: 8px 20px;
      border-radius: 0;
      overflow: hidden;
    }

    .btn::before {
      position: absolute;
      content: "";
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(120deg, transparent, #00fffc, transparent);
      transform: translateX(-100%);
      transition: 0.6s;
    }

    .btn:hover::before {
      transform: translateX(100%);
    }

    .btn:hover {
      background: transparent;
      box-shadow: 0 0 20px 10px white(23, 202, 229, 0.5);
    }

    .form-input-material {
      --input-default-border-color: white;
      --input-border-bottom-color: white;
    }

    .form-input-material input {
      color: white;
    }

    .login-form {
      backdrop-filter: blur(10px);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 50px 40px;
      color: white;
      box-shadow: 0 0.4px 0.4px rgba(255, 255, 255, 0.5), 0 1px 1px rgba(255, 255, 255, 0.5), 0 2.1px 2.1px rgba(255, 255, 255, 0.5), 0 4.4px 4.4px rgba(255, 255, 255, 0.5), 0 12px 12px rgba(181, 192, 199, 0.5);
      border-radius: 10px;
    }

    .signup {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: white;
    }

    .signup a {
      color: white; /* Set the color of the anchor text to white */
    }

    .login-form h1 {
      margin: 0 0 24px 0;
    }

    .login-form .form-input-material {
      margin: 12px 0;
    }

    .login-form .btn {
      width: 100%;
      margin: 18px 0 9px 0;
    }

    #source-link {
      top: 60px;
    }

    #source-link>i {
      color: rgb(94, 106, 210);
    }

    #yt-link {
      top: 10px;
    }

    #yt-link>i {
      color: rgb(219, 31, 106);
    }

    .meta-link {
      align-items: center;
      backdrop-filter: blur(3px);
      background-color: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 6px;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      display: inline-flex;
      gap: 5px;
      left: 10px;
      padding: 10px 20px;
      position: fixed;
      text-decoration: none;
      transition: background-color 600ms, border-color 600ms;
      z-index: 10000;
    }

    .meta-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .meta-link>i,
    .meta-link>span {
      height: 20px;
      line-height: 20px;
    }

    .meta-link>span {
      color: white;
      font-family: "Rubik", sans-serif;
      transition: color 600ms;
    }
  </style>
</head>

<body>
  <video autoplay muted loop id="video-background">
    <source src="img/ba3.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <form class="login-form" id="user_login">
    <h1>User Login</h1>
    <input autocomplete="off" type="hidden" name="action"  value="user_login">
    <div class="form-input-material">
      <input type="text" name="user_email" id="user_email" value="" placeholder=" " autocomplete="off" class="form-control-material" required />
      <label for="username">Email Address</label>
    </div>
    <div class="form-input-material">
      <input type="password" name="user_password" id="user_password" value="" placeholder=" " autocomplete="off" class="form-control-material" required />
      <label for="password">Password</label>
    </div>
    <button type="button" class="btn btn-primary btn-ghost" id="bt_user_login">Login</button>

    <div class="signup">
      <a href="signup.php">Don't Have Account? Sign up!!</a>
    </div>

  </form>

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
