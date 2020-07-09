<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IWD Express - Log in</title>

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
    <form class="form-signin" method="POST" action="validatoradmin.php">
  <a href="index.php"><img class="mb-2" src="./assets/brand/logo_transparent.png" alt="" width="150" height="150"></a>
  <h1 class="h3 mb-3 font-weight-normal">Administrator</h1>
  <label for="inputUsername" class="sr-only">Username</label>
  <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  <!-- <a href="register.php"><small class="form-text text-muted">don't have an account?</small></a> -->
  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>
</body>
</html>
