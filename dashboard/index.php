<?php
require "session.php";
$employeefile = file_get_contents('../database/employees.json');
$employees = json_decode($employeefile, true);
$transactionfile = file_get_contents('../database/transactions.json');
$transactions = json_decode($transactionfile, true);
$logisticfile = file_get_contents('../database/logistics.json');
$logistics = json_decode($logisticfile, true);
$customerfile = file_get_contents('../database/customers.json');
$customers = json_decode($customerfile, true);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>IWD Express - Administrator</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
  <link href="../assets/dist/css/bootstrap.css" rel="stylesheet">

  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

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
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <span class="navbar-brand col-md-3 col-lg-2 mr-0 px-3">IWD Express - <?php echo $_SESSION['administrator']; ?></span>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="logout.php">Sign out</a>
      </li>
    </ul>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="modalTransaction" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Transaction Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="./transactions/new.php">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Transaction ID</label>
                <input type="text" class="form-control" id="txtLogisticId" name="logisticId" required>
              </div>
              <div class="form-group col-md-6">
                <label>Transaction Date</label>
                <input type="text" class="form-control" id="txtLogisticOrigin" name="originAddress" required>
              </div>
              <div class="form-group col-md-6">
                <label>Logistic</label>
                <input type="text" class="form-control" id="txtLogisticShipper" name="shipper" required>
              </div>
              <div class="form-group col-md-6">
                <!-- <label>Addressee</label> -->
                <input type="text" class="form-control" id="txtLogisticAddressee" name="addressee" required>
              </div>
            </div>
            <div class="form-group">
              <label>Destination Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="destinationAddress" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-5">
                <label>City</label>
                <input type="text" class="form-control" id="inputCity" name="city" required>
              </div>
              <div class="form-group col-md-1">
                <input type="hidden" class="form-control" id="inputStatus" name="status" value="-" required>
              </div>
              <div class="form-group col-md-3">
                <label>Weight</label>
                <input type="text" class="form-control" id="inputWeight" name="weight" required>
              </div>
              <div class="form-group col-md-3">
                <label>Type</label>
                <select class="form-control" name="jenis">
                  <option selected disabled>...</option>
                  <option>SDS</option>
                  <option>ONS</option>
                  <option>TDS</option>
                  <option>REG</option>
                  <option>ECO</option>
                </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Confirm</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Transaction
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#transactions">
                <span data-feather="file"></span>
                Transactions
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="customer.php">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logistic.php">
                <span data-feather="bar-chart-2"></span>
                Logistics
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Transaction Form</span>
            <button type="button" class="btn btn-outline-dark d-flex align-items-center text-muted" data-toggle="modal" data-target="#modalTransaction">
              <span data-feather="plus-circle"></span>
            </button>
          </h6>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Export Transaction History</span>
            <button type="button" class="btn btn-outline-dark d-flex align-items-center text-muted">
              <span data-feather="plus-circle"></span>
            </button>
          </h6>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2" id="dashboard">Dashboard</h1>
          <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div> -->
        </div>

        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

        <h2 id="transactions" style="margin-top: 10px;">Transactions</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm" id="tableTransactions">
            <thead>
              <tr>
                <th>#</th>
                <th>Transaction ID</th>
                <th>Transaction Date</th>
                <th>Logistic ID</th>
                <th>Processed By</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($transactions) < 1) {
                echo "<tr>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "<td>Data Kosong</td>";
                echo "</tr>";
              } ?>
              <?php $no = 0;
              foreach ($transactions['records'] as $row => $obj) : $no++;
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $obj['transaction_id']; ?></td>
                  <td><?php echo $obj['transaction_date']; ?></td>
                  <td><?php echo $obj['logistic_id']; ?></td>
                  <td><?php echo $obj['employee_id']; ?></td>
                  <td><?php echo $obj['transaction_status']; ?></td>
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
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../assets/dist/js/bootstrap.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="dashboard.js"></script>

  <!-- datatables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('#tableTransactions').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#tableCustomers').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#tableLogistics').DataTable();
    });
  </script>

  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>