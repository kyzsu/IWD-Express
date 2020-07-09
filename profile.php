<?php
    require "templates/indexheader.php";
    session_start();
?>

            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="tracking.php">Tracking</a>
            <a class="nav-link" href="about.php">About</a>
            <?php
              if (!isset($_SESSION['username'])) {
                echo "<a class='nav-link' href='signin.php'>Login</a>";              
              } else {
                echo "<a class='nav-link active' href='profile.php'>Profile</a>";
                echo "<a class='nav-link' href='signout.php'>Log out</a>";
              }
            ?>
          </nav>
        </div>
      </header>
      <body>
        <main role="main">
          <p>Username: <?php echo $_SESSION['username'];?></p>
          <p>Username: <?php echo $_SESSION['email'];?></p>
        </main>
      </body>

<?php
    require "templates/indexfooter.php";
?>