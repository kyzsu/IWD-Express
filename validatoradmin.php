<?php
$employeefile = file_get_contents('./database/employees.json');
$employees = json_decode($employeefile,true);
$jumlah['records'] = count($employees["records"]);
if(isset($_POST['username']) && isset($_POST['password'])) {
    for($i=0; $i < $jumlah['records']; $i++) {
        if($employees['records'][$i]['username'] == $_POST['username']) {
            if($employees['records'][$i]['password'] == $_POST['password']) {
                $success = TRUE;
                session_start();
                $_SESSION['administrator'] = $_POST['username'];
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
  header("Location: admin.php");
}
?>