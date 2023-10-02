<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Information</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .info-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .info-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .info-text {
            font-size: 18px;
            margin-left: 20px;
        }
        .info-icon {
            font-size: 24px;
            vertical-align: middle;
            margin-right: 10px;
            margin-bottom: 10px;
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
                    <h2 class="mt-4 fs-3" style="padding-bottom: 15px;">Information</h2>

                    <div class="info-container">
                        <h2 class="info-title" style="text-align: center;"><i class="fas fa-info-circle info-icon"></i>Welcome to the Gadget Warehouse Application.</h2>
                        <p class="info-text">This application is designed to manage product inventory, record incoming and outgoing items, and monitor product stock in the warehouse.</p>
                        <p class="info-text">Key Features of the Application:</p>
                        <ul class="info-text">
                            <li><i class="fas fa-cube info-icon"></i>Product Inventory Management</li>
                            <li><i class="fas fa-download info-icon"></i>Manage Incoming Products</li>
                            <li><i class="fas fa-upload info-icon"></i>Manage Outgoing Products</li>
                            <li><i class="fas fa-chart-line info-icon"></i>Stock Monitoring</li>
                        </ul>
                        <p class="info-text">This application helps you efficiently and effectively manage your inventory of items.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>