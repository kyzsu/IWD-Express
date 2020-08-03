<?php
require "../sessioncrud.php";
if ( !empty($_POST)) { 
    
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
      
  #panggil json
  $customerfile = file_get_contents('../../database/customers.json');
  $data = json_decode($customerfile, true);
  unset($_POST["add"]);
  $data["records"] = array_values($data["records"]);
  array_push($data["records"], $_POST);
  file_put_contents("../../database/customers.json", json_encode($data, JSON_PRETTY_PRINT));
  header("Location: ../customer.php");
    }
?>