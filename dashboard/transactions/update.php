<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('../../database/transactions.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('../../database/transactions.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["transaction_id"] = isset($_POST["transaction_id"]) ? $_POST["transaction_id"] : "";
    $post["transaction_date"] = isset($_POST["transaction_date"]) ? $_POST["transaction_date"] : "";
    $post["logistic_id"] = isset($_POST["logistic_id"]) ? $_POST["logistic_id"] : "";
    $post["employee_id"] = isset($_POST["employee_id"]) ? $_POST["employee_id"] : "";

    if ($jsonfile) {
      unset($all["records"][$id]);
      $all["records"][$id] = $post;
      $all["records"] = array_values($all["records"]);
        file_put_contents("../../database/transactions.json", json_encode($all,JSON_PRETTY_PRINT));
    }
    header("Location:../index.php");
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
            <h3>Update Transaction <?php echo $jsonfile["transaction_id"]?></h3>
        </div>
        <?php if (isset($_GET["id"])): ?>
  <form method="POST" action="update.php">
  <div class="col-md-6">
   <input type="hidden" value="<?php echo $id ?>" name="id"/>
   <input type="hidden" value="<?php echo $jsonfile["transaction_id"] ?>" name="transaction_id"/>
   <input type="hidden" value="<?php echo $jsonfile["transaction_date"] ?>" name="transaction_date"/>
   <!-- <div class="form-group">
    <label for="inputUsername">Username</label>
    <input type="text" class="form-control" required="required" id="inputUsername" value="" name="username" placeholder="Username">
    <span class="help-block"></span>
   </div>
    -->
   <div class="form-group">
    <label for="inputLogistic">Logistic Number</label>
    <input type="text" class="form-control" required="required" id="inputLogistic" value="<?php echo $jsonfile["logistic_id"] ?>" name="logistic_id" placeholder="Logistic Number">
    <span class="help-block"></span>
   </div>
   
   <div class="form-group">
    <label for="inputEmployee">Processed By</label>
    <input type="text" required="required" class="form-control" id="inputEmployee" value="<?php echo $jsonfile["employee_id"] ?>" 
     name="employee_id" placeholder="employee number">
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