<?php
require "../sessioncrud.php";
    if ( !empty($_POST)) { 
        
        switch ($_POST['jenis']) {
            case "REG":
                $tarif = 16500;
                break;
            case "ONS":
                $tarif = 24000;
                break;
            case "ECO":
                $tarif = 12500;
        }

        $logistic_id = $_POST['logistic_id'];
        $logistic_shipper = $_POST['shipper'];
        $logistic_addressee = $_POST['addressee'];
        $logstic_origin = $_POST['originAddress'];
        $logistic_destination = $_POST['destinationAddress'].", ".$_POST['city'];
        $logistic_weight = $_POST['weight'];
        $category_id = $_POST['jenis'];
        $status = "";
        $_POST['biaya'] = $tarif * $_POST['weight'];
      
  #panggil json
  $logisticfile = file_get_contents('../../database/logistics.json');
  $data = json_decode($logisticfile, true);
  unset($_POST["add"]);
  $data["records"] = array_values($data["records"]);
  array_push($data["records"], $_POST);
  file_put_contents("../../database/logistics.json", json_encode($data, JSON_PRETTY_PRINT));
  header("Location: ../logistic.php");
    }

    // $transactionfile = file_get_contents('../../database/transactions.json');
?>