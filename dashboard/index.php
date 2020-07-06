<?php
$customerfile = file_get_contents('../database/customers.json');
$customers = json_decode($customerfile,true);
$transactionfile = file_get_contents('../database/transactions.json');
$transactions = json_decode($transactionfile,true);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">IWD Express - Administrator</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../signin.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#customers">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <h2 id="transactions">Transactions</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Transaction ID</th>
              <th>Transaction Date</th>
              <th>Logistic ID</th>
              <th>Processed By</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=0;
              foreach ($transactions as $row => $obj): $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $obj['transaction_id']; ?></td>
              <td><?php echo $obj['transaction_date']; ?></td>
              <td><?php echo $obj['logistic_id']; ?></td>
              <td><?php echo $obj['employee_id']; ?></td>
              <td>
                <a class="btn btn-xs btn-warning" href="transactions/update.php?id=<?php echo $row; ?>">Edit</a>
                <a class="btn btn-xs btn-danger" href="transactions/delete.php?id=<?php echo $row; ?>">Delete</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Transaction ID</th>
              <th>Transaction Date</th>
              <th>Logistic ID</th>
              <th>Processed By</th>
            </tr>
          </tfoot>
        </table>
      </div>

      <h2 id="customers">Customers</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($customers['records']) < 1) {
              echo "<tr>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
              echo "</tr>";
            }?>
            <?php $no=0;foreach ($customers['records'] as $row => $obj): $no++;?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $obj['username']; ?></td>
              <td><?php echo $obj['email']; ?></td>
              <td><?php echo $obj['phonenumber']; ?></td>
              <td>
                <a class="btn btn-xs btn-warning" href="customers/update.php?id=<?php echo $row; ?>">Edit</a>
                <a class="btn btn-xs btn-danger" href="customers/delete.php?id=<?php echo $row; ?>">Delete</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
