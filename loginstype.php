<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Types</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon1.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
           
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative; /* Make the body a relative positioning context */
        }

       

        .login-container {
            text-align: center;
        }

        .login-option {
            display: flex; /* Use flex container */
            align-items: center; /* Center items vertically in flex container */
            margin: 10px;
            padding: 15px 30px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .login-option:hover {
            background-color: #2980b9; /* A darker shade of blue on hover */
        }

        .login-option.primary {
            background-color: #3498db; /* A shade of blue */
        }

        .login-option.secondary {
            background-color: #e74c3c; /* A shade of red for contrast */
        }

        .login-option.tertiary {
            background-color: #27ae60; /* A shade of green for contrast */
        }

        .icon {
            margin-right: 10px; /* Adjust margin as needed */
        }

        .admin-icon {
            color: #ec7063; /* A shade of red for the admin icon */
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
    #logo{
        position: fixed;
            top: 30px; /* Adjust top position as needed */
            left: 489px; /* Adjust left position as needed */
            width: 300px;
            height: 130px;
    }
    </style>
</head>

<body>

<video autoplay muted loop id="video-background">
    <source src="img/baa.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <video autoplay muted loop id="logo">
    <source src="img/Event-Org.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
    <div class="login-container">
        <a href="login.php" class="login-option primary">
            <i class="icon">👤</i> User Login
        </a>
        <a href="vendor/login.php" class="login-option secondary">
            <i class="icon">👥</i> Organizer Login
        </a>
        <a href="admin/login.php" class="login-option tertiary">
            <i class="icon admin-icon">🔒</i> Admin Login
        </a>
    </div>
</body>

</html>
