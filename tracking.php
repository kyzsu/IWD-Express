<?php
  require "templates/indexheader.php";
  session_start();
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
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Enter Tracking number" aria-label="Enter Tracking number">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button">Find</button>
      </div>
    </div>
  </main>

<?php
  require "templates/indexfooter.php";
?>
