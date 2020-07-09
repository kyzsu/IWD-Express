<?php
    require "templates/indexheader.php";
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
            <form action="" method="POST">
              <div class="form-group">
                <label for="InputUsername">Username</label>
                <input type="text" class="form-control" id="InputUsername" aria-describedby="emailHelp" value="<?php echo $username;?>">
                <!-- <small id="emailHelp" class="form-text text-muted"></small> -->
              </div>
              <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" class="form-control" id="InputEmai" aria-describedby="emailHelp" value="<?php echo $email;?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="InputPhoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="InputPhoneNumber" value="<?php echo $phonenumber;?>">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="Check1" required autofocus>
                <label class="form-check-label" for="exampleCheck1">I have checked all of my data.</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
          </div>
        </main>
      </body>

<?php
    require "templates/indexfooter.php";
?>