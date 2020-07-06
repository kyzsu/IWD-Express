<?php
$employeefile = file_get_contents('./database/employees.json');
$employees = json_decode($employeefile,true);
$jumlah['records'] = count($employees["records"]);
// $us = 'immanuelirsal';
// $pw = 'admin123';
// echo $customers['records'][0]['username'];
if(isset($_POST['username']) && isset($_POST['password'])) {
    for($i=0; $i < $jumlah['records']; $i++) {
        if($employees['records'][$i]['username'] == $_POST['username']) {
            if($employees['records'][$i]['password'] == $_POST['password']) {
                $success = TRUE;
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
  header("Location: dashboard/index.php");
} else {
  header("Location: signin.php");
}
?>