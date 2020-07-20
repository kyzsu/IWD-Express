<?php
require "../sessioncrud.php";
if (isset($_GET["id"])) {
  $id = (int) $_GET["id"];
  $getfile = file_get_contents('../../database/customers.json');
  $jsonfile = json_decode($getfile, true);
  $jsonfile = $jsonfile["records"];
  $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
  $id = (int) $_POST["id"];
  $getfile = file_get_contents('../../database/customers.json');
  $all = json_decode($getfile, true);
  $jsonfile = $all["records"];
  $jsonfile = $jsonfile[$id];

  $post["username"] = isset($_POST["username"]) ? $_POST["username"] : "";
  $post["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
  $post["phonenumber"] = isset($_POST["phonenumber"]) ? $_POST["phonenumber"] : "";
  $post["password"] = isset($_POST["password"]) ? $_POST["password"] : "";

  if ($jsonfile) {
    unset($all["records"][$id]);
    $all["records"][$id] = $post;
    $all["records"] = array_values($all["records"]);
    file_put_contents("../../database/customers.json", json_encode($all, JSON_PRETTY_PRINT));
  }
  header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Customer</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <style type="text/css">
    .navbar-default {
      background-color: #3b5998;
      font-size: 18px;
      color: #ffffff;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <h4>IWD Express</h4>
      </div>
    </div>
  </nav>
  <div class="container">
    <div style="margin-top: 20px;">
      <h3 align="center">Update Customer <?php echo $jsonfile["username"] ?></h3>
    </div>
    <?php if (isset($_GET["id"])) : ?>
      <form method="POST" action="update.php">
        <div class="container" align="center" style="margin-top: 50px;">
          <input type="hidden" value="<?php echo $id ?>" name="id" />
          <input type="hidden" value="<?php echo $jsonfile["password"] ?>" name="password" />
          <fieldset disabled>
            <div class="form-group col-md-4">
              <label for="inputUsername">Username</label>
              <input type="text" class="form-control" required="required" id="inputUsername" value="<?php echo $jsonfile["username"] ?>" name="username" placeholder="Username">
              <span class="help-block"></span>
            </div>
          </fieldset>
          <div class="form-group col-md-4">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" required="required" id="inputEmail" value="<?php echo $jsonfile["email"] ?>" name="email" placeholder="Email">
            <span class="help-block"></span>
          </div>

          <div class="form-group col-md-4">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="text" required="required" class="form-control" id="inputPhoneNumber" value="<?php echo $jsonfile["phonenumber"] ?>" name="phonenumber" placeholder="phonenumber">
            <span class="help-block"></span>
          </div>
          <div class="form-actions col-md-12">
            <a class="btn btn btn-danger" href="../index.php">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
    <?php endif; ?>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>