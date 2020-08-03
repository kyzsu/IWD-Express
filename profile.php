<?php
require "templates/indexheader.php";

if (isset($_POST["submit"])) {
  $updatec = file_get_contents('./database/customers.json');
  $c = json_decode($updatec, true);
  $jumlah['records'] = count($c["records"]);
  for ($i = 0; $i < $jumlah['records']; $i++) {
    if ($c['records'][$i]['username'] == $_SESSION['username']) {
      $getfile = file_get_contents('../../database/transactions.json');
      $all = json_decode($getfile, true);
      $jsonfile = $all["records"];
      $jsonfile = $jsonfile[$id];
      $post['username'] = $_POST[$c['records'][$i]['username']];
      $post['email'] = $_POST['updateEmail'];
      $post['phonenumber'] = $_POST['updateNumber'];
      $post['password'] = $_POST[$c['records'][$i]['password']];

      if ($jsonfile) {
        unset($all["records"][$i]);
        $all["records"][$i] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("./database/customers.json", json_encode($all, JSON_PRETTY_PRINT));
      }
      header("Location:./profile.php");
    }
  }
}
?>

<a class="nav-link" href="index.php">Home</a>
<a class="nav-link" href="tracking.php">Tracking</a>
<a class="nav-link" href="about.php">About</a>
<?php
if (!isset($_SESSION['username'])) {
  header('Location: signin.php');
} else {
  echo "<a class='nav-link active' href='profile.php'>Profile</a>";
  echo "<a class='nav-link' href='signout.php'>Log out</a>";
}
?>
</nav>
</div>
</header>

<body>
  <main>
    <div class="card">
      <div class="card-body">
        <form action="profile.php" method="POST">
          <div class="form-group">
            <h3>Hello, <?php echo $username; ?></h3>
          </div>
          <div class="form-group">
            <label for="InputEmail">Email address</label>
            <input type="email" class="form-control" id="InputEmai" name="updateEmail" aria-describedby="emailHelp" value="<?php echo $email; ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="InputPhoneNumber">Phone Number</label>
            <input type="text" class="form-control" id="InputPhoneNumber" name="updateNumber" value="<?php echo $phonenumber; ?>">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="Check1" required autofocus>
            <label class="form-check-label" for="exampleCheck1">I have checked all of my data.</label>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </main>
</body>

<?php
require "templates/indexfooter.php";
?>