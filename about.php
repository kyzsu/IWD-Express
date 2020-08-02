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

      <div class="container">
        <div class="row">
          <div class="col-6 col-md-4">
            <div class="card">
              <img src="https://instagram.fjog3-1.fna.fbcdn.net/v/t51.2885-15/e35/107819293_572144870147906_8764993387048674934_n.jpg?_nc_ht=instagram.fjog3-1.fna.fbcdn.net&_nc_cat=102&_nc_ohc=N6qREtw7qEYAX9DVMdY&oh=43fa7220e6f7e1e41e1d1ff09fb3a03d&oe=5F4056E3" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Irvons Anugera</h5>
                <p class="card-text">-</p>
                <a href="https://www.instagram.com/irvnsanugra/" class="btn btn-primary">Instagram</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4">
            <div class="card">
              <img src="https://instagram.fjog3-1.fna.fbcdn.net/v/t51.2885-15/e35/42513232_331129677452717_4251300561934866316_n.jpg?_nc_ht=instagram.fjog3-1.fna.fbcdn.net&_nc_cat=105&_nc_ohc=QBJaLnz7ibcAX_S657k&oh=524d6a89bc95742e97e7cd39b5a4bf12&oe=5F40B619" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Dandy Kurniawan</h5>
                <p class="card-text">-</p>
                <a href="https://www.instagram.com/gregoriusdandy/" class="btn btn-primary">Instagram</a>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-4">
            <div class="card">
              <img src="https://instagram.fjog3-1.fna.fbcdn.net/v/t51.2885-15/e35/36601413_512352795864686_7429256754413699072_n.jpg?_nc_ht=instagram.fjog3-1.fna.fbcdn.net&_nc_cat=102&_nc_ohc=2LuL50N1X2cAX_XgIvs&oh=a1eccc47115212562cad08e588c27b27&oe=5F40315F" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Williams Irsal</h5>
                <p class="card-text">1</p>
                <a href="https://www.instagram.com/willy.co.nz/" class="btn btn-primary">Instagram</a>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
require "templates/indexfooter.php";
?>
