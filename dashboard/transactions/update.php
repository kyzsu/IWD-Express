<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('../database/customers.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('../database/customers.json');
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
        file_put_contents("../database/customers.json", json_encode($all,JSON_PRETTY_PRINT));
    }
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="tutorial-boostrap-merubaha-warna">
 <title>Tutorial Boostrap </title>
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 
 <style type="text/css">
 .navbar-default {
  background-color: #3b5998;
  font-size:18px;
  color:#ffffff;
 }
 </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <h4>under construction LOL</h4>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="row">
            <h3>Update Customer <?php echo $jsonfile["username"]?></h3>
        </div>
        <?php if (isset($_GET["id"])): ?>
  <form method="POST" action="update.php">
  <div class="col-md-6">
   <input type="hidden" value="<?php echo $id ?>" name="id"/>
   <input type="hidden" value="<?php echo $jsonfile["password"] ?>" name="password"/>
   <div class="form-group">
    <label for="inputUsername">Username</label>
    <input type="text" class="form-control" required="required" id="inputUsername" value="<?php echo $jsonfile["username"] ?>" name="username" placeholder="Username">
    <span class="help-block"></span>
   </div>
   
   <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="text" class="form-control" required="required" id="inputEmail" value="<?php echo $jsonfile["email"] ?>" name="email" placeholder="Email">
    <span class="help-block"></span>
   </div>
   
   <div class="form-group">
    <label for="inputPhoneNumber">Phone Number</label>
    <input type="text" required="required" class="form-control" id="inputPhoneNumber" value="<?php echo $jsonfile["phonenumber"] ?>" 
     name="phonenumber" placeholder="phonenumber">
    <span class="help-block"></span>
   </div>
    
   <div class="form-actions">
    <button type="submit" class="btn btn-primary">Update</button>
    <a class="btn btn btn-default" href="index.php">Back</a>
   </div>
  </div>
  </form>
  <?php endif; ?>     
    </div> 
</div> 
</body>
</html>