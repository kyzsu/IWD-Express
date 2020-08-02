<?php
require "templates/indexheader.php";
$transactionfile = file_get_contents('./database/transactions.json');
$transactions = json_decode($transactionfile, true);
$jumlah['records'] = count($transactions["records"]);

// $trans_number = $_POST["tracking_number"];

if (isset($_POST['tracking_number'])) {
  for ($i = 0; $i < $jumlah['records']; $i++) {
    if ($transactions['records'][$i]['transaction_id'] == $_POST['tracking_number']) {
      $nomor = $transactions['records'][$i]['transaction_id'];
      $status = $transactions['records'][$i]['transaction_status'];
    }
  }
}

?>

<a class="nav-link" href="index.php">Home</a>
<a class="nav-link active" href="#">Tracking</a>
<a class="nav-link" href="about.php">About</a>
<?php
if (!isset($_SESSION['username'])) {
  echo "<a class='nav-link' href='signin.php'>Login</a>";
} else {
  echo "<a class='nav-link' href='profile.php'>Profile</a>";
  echo "<a class='nav-link' href='signout.php'>Log out</a>";
}
?>
</nav>
</div>
</header>

<main role="main" class="inner cover">
  <h1 class="cover-heading pb-3">Track</h1>
  <form method="POST">
    <div class="input-group mb-3">
        <input type='text' class='form-control' placeholder='Enter Transaction number' name='tracking_number' id='tracking_number'>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Find</button>
      </div>
    </div>
  </form>
  <?php if (isset($status)) : ?>
    <h3>Status Terkini <?php echo $nomor;?></h3>
    <p><?php echo $status ?></p>
  <?php endif; ?>

</main>
<?php
require "templates/indexfooter.php";
?>