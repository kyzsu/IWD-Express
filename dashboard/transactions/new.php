<?php
require "../sessioncrud.php";
if ( !empty($_POST)) { 
    
        $transaction_id = $_POST['transaction_id'];
        $transaction_date = $_POST['transaction_date'];
        $logistic_id = $_POST['logistic_id'];
        $employee_id = $_POST['employee_id'];
        $transaction_status = $_POST['transaction_status'];
      
  #panggil json
  $transactionfile = file_get_contents('../../database/transactions.json');
  $data = json_decode($transactionfile, true);
  unset($_POST["add"]);
  $data["records"] = array_values($data["records"]);
  array_push($data["records"], $_POST);
  file_put_contents("../../database/transactions.json", json_encode($data, JSON_PRETTY_PRINT));
  header("Location: ../index.php");
    }
?>