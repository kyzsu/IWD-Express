<?php
require "../sessioncrud.php";
$logisticfile = file_get_contents('../../database/logistics.json');
$logistics = json_decode($logisticfile, true);

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
  $post["transaction_status"] = isset($_POST["transaction_status"]) ? $_POST["transaction_status"] : "";

  if ($jsonfile) {
    unset($all["records"][$id]);
    $all["records"][$id] = $post;
    $all["records"] = array_values($all["records"]);
    file_put_contents("../../database/transactions.json", json_encode($all, JSON_PRETTY_PRINT));
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
      <h3>Update Transaction <?php echo $jsonfile["transaction_id"] ?></h3>
    </div>
    <?php if (isset($_GET["id"])) : ?>
      <form method="POST" action="update.php">
        <div class="container" align="center" style="margin-top: 50px;">
          <input type="hidden" value="<?php echo $id ?>" name="id" />
          <input type="hidden" value="<?php echo $jsonfile["transaction_id"] ?>" name="transaction_id" />
          <div class="form-group col-md-4">
            <label for="inputDate">Transaction Date</label>
            <input type="text" required="required" class="form-control" id="inputDate" value="<?php echo $jsonfile["transaction_date"] ?>" name="transaction_date" placeholder="yyyy-MM-dd" />
            <span class="help-block"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmployee">Logistic</label>
            <select class="form-control" name="logistic_id">
              <option><?php echo $jsonfile["logistic_id"] ?></option>
              <?php
              foreach ($logistics['records'] as $row => $obj) :
              ?>
                <option><?php echo $obj['logisticId']; ?></option>
              <?php endforeach; ?>
            </select>
            <span class="help-block"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmployee">Processed By</label>
            <input type="text" required="required" class="form-control" id="inputEmployee" value="<?php echo $_SESSION['administrator'] ?>" name="employee_id" placeholder="Employee">
            <span class="help-block"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmployee">Location Status</label>
            <input type="text" required="required" class="form-control" id="inputEmployee" value="<?php echo $cabang ?>" name="transaction_status" placeholder="Lokasi Cabang">
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