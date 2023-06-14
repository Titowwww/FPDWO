<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - Adventure Works</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/11.0.1/highcharts.js" integrity="sha512-bdh59dK4gjyd/T+ptbOau3WEjtNLRy1eWtYkAfv2PCQODTaN2XXLVWKGQbPLbd5JB1Gn1oStmblZMSgXY29nrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.15/plugins/export/export.js"></script>
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'Sidebar.php';?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Dashboard</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
          <div class="row">
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-warning text-white mb-4">
                      <div class="card-body">Total Penjualan</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <?php
                           $host       = "localhost";
                           $user       = "root";
                           $password   = "";
                           $database   = "fpdwo";
                           $mysqli     = mysqli_connect($host, $user, $password, $database);

                           $sql = "SELECT SUM(OrderQty) AS jumlah_order from fact_table";
                              $query = mysqli_query($mysqli,$sql);
                                   while($row2=mysqli_fetch_array($query)){
                                      echo number_format($row2['jumlah_order']);
                                   }
                                   ?>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-success text-white mb-4">
                      <div class="card-body">Total Produk</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                       <?php
                                 $host       = "localhost";
                                 $user       = "root";
                                 $password   = "";
                                 $database   = "fpdwo";
                                 $mysqli     = mysqli_connect($host, $user, $password, $database);
                                      $sql = "SELECT COUNT(ProductID) as jumlah_produk from fact_table";
                                       $query = mysqli_query($mysqli,$sql);
                                          while($row2=mysqli_fetch_array($query)){
                                              echo number_format($row2['jumlah_produk']);
                                          }
                                      ?>
                      </div>
                  </div>
              </div>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
              <div class="text-muted">Copyright &copy; Your Website 2023</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
  </body>
  </html>
