<?php
  if ( !empty($_POST)) { 
    
    $username  = $_POST['fname'];
    $email  = $_POST['lname'];
    $phonenumber = $_POST['age'];
    $password = $_POST['gender'];
  
    $file = file_get_contents('./database/customers.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["records"] = array_values($data["records"]);
    array_push($data["records"], $_POST);
    file_put_contents("./database/customers.json", json_encode($data,JSON_PRETTY_PRINT));
    header("Location: signin.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>IWD Express - Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="POST">
      <a href="index.php"><img class="mb-2" src="./assets/brand/logo_transparent.png" alt="" width="150" height="150"></a>
      <h1 class="h3 mb-3 font-weight-normal">Customer Register Form</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
      <label for="inputPhoneNumber" class="sr-only">PhoneNumber</label>
      <input type="text" id="inputPhoneNumber" class="form-control" name="phonenumber" placeholder="Phone Number" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <a href="signin.php"><small class="form-text text-muted">Already have an account?</small></a>
      <p class="mt-5 mb-3 text-muted">&copy; IWD Express 2020</p>
    </form>
</body>
</html>
