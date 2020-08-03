<?php
session_start();
if (!isset($_SESSION['administrator'])) {
    header('Location: ../login.php');
} else {
  $employeefile = file_get_contents('../database/employees.json');
  $employees = json_decode($employeefile, true);
  $jumlah['records'] = count($employees["records"]);

  for ($i = 0; $i < $jumlah['records']; $i++) {
    if ($employees['records'][$i]['username'] == $_SESSION['administrator']) {
      $username = $employees['records'][$i]['username'];
      $email = $employees['records'][$i]['email'];
      $phonenumber = $employees['records'][$i]['phonenumber'];
      $cabang = $employees['records'][$i]['cabang'];
    }
  }
  
}
?>