<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $getfile = file_get_contents('../../database/logistics.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $getfile = file_get_contents('../../database/logistics.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["logisticId"] = isset($_POST["logisticId"]) ? $_POST["logisticId"] : "";
    $post["originAddress"] = isset($_POST["originAddress"]) ? $_POST["originAddress"] : "";
    $post["shipper"] = isset($_POST["shipper"]) ? $_POST["shipper"] : "";
    $post["addressee"] = isset($_POST["addressee"]) ? $_POST["addressee"] : "";
    $post["destinationAddress"] = isset($_POST["destinationAddress"]) ? $_POST["destinationAddress"] : "";
    $post["city"] = isset($_POST["city"]) ? $_POST["city"] : "";
    $post["status"] = isset($_POST["status"]) ? $_POST["status"] : "";
    $post["weight"] = isset($_POST["weight"]) ? $_POST["weight"] : "";
    $post["jenis"] = isset($_POST["jenis"]) ? $_POST["jenis"] : "";


    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("../../database/logistics.json", json_encode($all, JSON_PRETTY_PRINT));
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
            <!-- <h3 align="center">Update Logistics <?php echo $jsonfile["logisticId"] ?></h3> -->
        </div>
        <?php if (isset($_GET["id"])) : ?>
            <form method="POST" action="update.php">
                <div class="container" style="margin-top: 50px;" align="center">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" value="<?php echo $id ?>" name="id" />
                            <input type="hidden" value="<?php echo $jsonfile["logisticId"] ?>" name="logisticId" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <fieldset disabled>
                                <label for="inputLogisticId">Logistic ID</label>
                                <input type="text" class="form-control" required="required" id="inputLogisticId" value="<?php echo $jsonfile["logisticId"] ?>" name="logisticId">
                                <span class="help-block"></span>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputOriginAddress">Origin</label>
                            <input type="text" class="form-control" required="required" id="inputOriginAddress" value="<?php echo $jsonfile["originAddress"] ?>" name="originAddress">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDestinationAddress">Destination</label>
                            <input type="text" required="required" class="form-control" id="inputDestinationAddress" value="<?php echo $jsonfile["destinationAddress"] ?>" name="destinationAddress">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputShipper">shipper</label>
                            <input type="text" class="form-control" required="required" id="inputShipper" value="<?php echo $jsonfile["shipper"] ?>" name="shipper">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddressee">Receiver</label>
                            <input type="text" required="required" class="form-control" id="inputAddressee" value="<?php echo $jsonfile["addressee"] ?>" name="addressee">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputOriginAddress">City</label>
                            <input type="text" class="form-control" required="required" id="inputCity" value="<?php echo $jsonfile["city"] ?>" name="city">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputWeight">Status</label>
                            <input type="text" required="required" class="form-control" id="inputStatus" value="<?php echo $jsonfile["status"] ?>" name="status">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="inputWeight">Weight</label>
                            <input type="text" required="required" class="form-control" id="inputWeight" value="<?php echo $jsonfile["weight"] ?>" name="weight">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputJenis">Type</label>
                            <select class="form-control" name="jenis" id="inputJenis" value="<?php echo $jsonfile["weight"] ?>" required="required">
                                <option selected disabled>...</option>
                                <option>SDS</option>
                                <option>ONS</option>
                                <option>TDS</option>
                                <option>REG</option>
                                <option>ECO</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
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