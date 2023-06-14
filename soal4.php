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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include 'Sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Line Chart
                    </div>
                    <?php
                    include 'koneksi.php';
                    $mainQuery = "SELECT time.tahun, SUM(fact_table.LineTotal) AS LineTotal FROM `fact_table` JOIN time ON time.time_id = fact_table.time_id GROUP BY time.tahun;";
                    $mainResult = $conn->query($mainQuery);
                    $mainData = array();

                    if ($mainResult->num_rows > 0) {
                        while ($row = $mainResult->fetch_assoc()) {
                            $mainData[] = array(
                                'name' => $row['tahun'],
                                'y' => floatval($row['LineTotal']),
                            );
                        }
                    }

                    $conn->close();
                    ?>

                    <div class="card-body">
                        <!DOCTYPE html>
                        <html>

                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                            <title></title>
                            <script type="text/javascript">
                                var mainChartData = <?php echo json_encode($mainData); ?>;

                                $(function() {
                                    var chart;
                                    $(document).ready(function() {
                                        chart = new Highcharts.Chart({
                                            chart: {
                                                renderTo: 'mygraph',
                                                type: 'line'
                                            },
                                            title: {
                                                text: 'Jumlah Pendapatan Pada Penjualan Sport-100 Helmet, Red'
                                            },
                                            subtitle: {
                                                text: ''
                                            },
                                            xAxis: {
                                                categories: <?php echo json_encode(array_column($mainData, 'name')); ?>
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'Jumlah'
                                                },
                                                plotLines: [{
                                                    value: 0,
                                                    width: 1,
                                                    color: '#808080'
                                                }]
                                            },
                                            tooltip: {
                                                formatter: function() {
                                                    return '<b>' + this.series.name + '</b><br/>' +
                                                        this.x + ': ' + this.y;
                                                }
                                            },
                                            legend: {
                                                layout: 'vertical',
                                                align: 'right',
                                                verticalAlign: 'top',
                                                x: -10,
                                                y: 120,
                                                borderWidth: 0
                                            },
                                            series: [{
                                                name: 'Pendapatan',
                                                data: <?php echo json_encode(array_column($mainData, 'y')); ?>
                                            }]
                                        });
                                    });
                                });
                            </script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/11.0.1/highcharts.js" integrity="sha512-bdh59dK4gjyd/T+ptbOau3WEjtNLRy1eWtYkAfv2PCQODTaN2XXLVWKGQbPLbd5JB1Gn1oStmblZMSgXY29nrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.15/plugins/export/export.js"></script>
                        </head>

                        <body>
                            <div class="container" style="margin-top: 20px">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div id="mygraph"></div>
                                    </div>
                                </div>
                            </div>
                        </body>

                        </html>

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
