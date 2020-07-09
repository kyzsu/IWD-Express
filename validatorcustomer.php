<?php
$customerfile = file_get_contents('./database/customers.json');
$customers = json_decode($customerfile,true);
$jumlah['records'] = count($customers["records"]);
// $us = 'immanuelirsal';
// $pw = 'admin123';
// echo $customers['records'][0]['username'];
if(isset($_POST['username']) && isset($_POST['password'])) {
    for($i=0; $i < $jumlah['records']; $i++) {
        if($customers['records'][$i]['username'] == $_POST['username']) {
            if($customers['records'][$i]['password'] == $_POST['password']) {
                $success = TRUE;
                session_start();
                $_SESSION['username'] = $_POST['username'];
                break;
            } else {
                $success = FALSE;
            }
        } else {
            $success = FALSE;
        }
    }
} else {
    echo "Harap isi semua kolom yang tersedia";
}

if($success == TRUE) {
  header("Location: index.php");
} else {
  header("Location: signin.php");
}
?>