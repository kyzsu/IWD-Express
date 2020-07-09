<?php
  require "templates/indexheader.php";
  session_start();
  // $_SESSION['username'] = "Williams";
?>
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="tracking.php">Tracking</a>
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
        <h1 class="h2 cover-heading">Selamat Datang di IWD Express</h1>
        <p class="lead">Deskripsi tentang IWD</p>
        <p class="lead">
          <a href="about.php" class="btn btn-lg btn-secondary">Lebih lanjut</a>
        </p>
      </main>

<?php 
  require "templates/indexfooter.php";
?>