<?php
require "templates/indexheader.php";
?>

            <a class="nav-link" href="index.php">Home</a>
            <a class="nav-link" href="tracking.php">Tracking</a>
            <a class="nav-link active" href="#">About</a>
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
        <p class="lead">
          <a href="about.php" class="btn btn-lg btn-secondary">Learn more</a>
        </p>
      </main>

<?php
require "templates/indexfooter.php";
?>
