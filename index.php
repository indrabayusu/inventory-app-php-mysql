<?php
require 'function.php';

$jumlahStockProduct = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(stock) AS total FROM stock"));
$jumlahIncomingStock = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(qty) AS total FROM masuk"));
$jumlahOutofStock = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(qty) AS total FROM keluar"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-body h5 {
            font-size: 24px;
        }
        .card-text {
            font-size: 18px;
        }
        .stock-card {
            background-color: #4CAF50;
            color: #fff;
        }
        .incoming-card {
            background-color: #2196F3;
            color: #fff;
        }
        .out-of-stock-card {
            background-color: #F44336;
            color: #fff;
        }
        .card-icon {
            font-size: 48px;
        }
        .card-link {
            text-decoration: none;
            color: inherit;
        }
        .card-link:hover {
            opacity: 0.8;
        }
        .admin-greeting {
            text-align: center;
            font-size: 30px;
            color: #333;
        }
        .admin-icon {
            text-align: center;
            font-size: 54px;
            color: #333;
            margin-bottom: 15px;
        }
        /*.row {
            margin-bottom: -20px;
        }
*/        .chart-container {
            width: 50%;
            display: flex;
            justify-content: space-between;
            align-items: center; 
            margin-top: 20px; 
            margin-bottom: 20px;
        }
        @media (max-width: 600px) {
            .chart-container {
                width: 100%;
                flex-direction: column; 
                align-items: flex-start; 
            }
        
            .chart-container canvas {
                margin-bottom: 10px; 
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="dashboard.php">Gadget Warehouse</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-dashboard"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="stock.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Stock Products
                        </a>
                        <a class="nav-link" href="in.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-down"></i></div>
                            Incoming Stock
                        </a>
                        <a class="nav-link" href="out.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-up"></i></div>
                            Outgoing Stock
                        </a>
                        <a class="nav-link" href="info.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-info"></i></div>
                            Information
                        </a>
                        <!-- <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a> -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4 fs-3" style="padding-bottom: 15px;">Dashboard</h2>

                    <!-- <div class="admin-greeting">
                        Welcome back, Admin!
                    </div>
                    <div class="admin-icon">
                        <i class="fas fa-user"></i>
                    </div> -->

                    <div class="row">
                        <div class="col-md-4">
                            <a href="index.php" class="card-link">
                                <div class="card mb-4 stock-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Stock Products</h5>
                                        <i class="fas fa-box card-icon pt-1 pb-2"></i>
                                        <p class="card-text"><?= $jumlahStockProduct['total'] ?> items</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="masuk.php" class="card-link">
                                <div class="card mb-4 incoming-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Incoming Stock</h5>
                                        <i class="fas fa-arrow-down card-icon pt-1 pb-2"></i>
                                        <p class="card-text"><?= $jumlahIncomingStock['total'] ?> items</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="keluar.php" class="card-link">
                                <div class="card mb-4 out-of-stock-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Outgoing Stock</h5>
                                        <i class="fas fa-arrow-up card-icon pt-1 pb-2"></i>
                                        <p class="card-text"><?= $jumlahOutofStock['total'] ?> items</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <h3 class="mt-4">Product Stock Monitoring</h3>
                    <div class="chart-container">
                        <canvas id="incomingStockChart" width="50%" height="15%"></canvas>
                        <canvas id="outgoingStockChart" width="50%" height="15%"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script>
        function getIncomingStockData() {
            return fetch('get_incoming_stock_data.php') 
                .then(response => response.json())
                .then(data => data);
        }
    
        function getOutgoingStockData() {
            return fetch('get_outgoing_stock_data.php') 
                .then(response => response.json())
                .then(data => data);
        }
    
        var incomingStockChart;
        getIncomingStockData().then(data => {
            var incomingCtx = document.getElementById('incomingStockChart').getContext('2d');
            incomingStockChart = new Chart(incomingCtx, {
                type: 'line', // Jenis grafik (line, line, dll.)
                data: {
                    labels: data.labels, // Label data (bulan, tahun, dsb.)
                    datasets: [{
                        label: 'Incoming Stock',
                        data: data.values, // Data stok masuk
                        backgroundColor: 'rgba(33, 150, 243, 0.5)',
                        borderColor: 'rgba(33, 150, 243, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Items'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan'
                            }
                        }
                    }
                }
            });
        });
    
        var outgoingStockChart;
        getOutgoingStockData().then(data => {
            var outgoingCtx = document.getElementById('outgoingStockChart').getContext('2d');
            outgoingStockChart = new Chart(outgoingCtx, {
                type: 'line',
                data: {
                    labels: data.labels, 
                    datasets: [{
                        label: 'Outgoing Stock',
                        data: data.values, 
                        backgroundColor: 'rgba(244, 67, 54, 0.5)',
                        borderColor: 'rgba(244, 67, 54, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Items'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>