<?php
  require "indexheader.php";
?>

        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link active" href="#">Tracking</a>
        <a class="nav-link" href="about.php">About</a>
        <a class="nav-link" href="signin.php">Login</a>
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
  require "indexfooter.php";
?>
