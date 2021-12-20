<?php
session_start();
include('config/connection.php');
if(!isset($_SESSION["email_admin"])){
  header("location: adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maqna Hijab | admin page</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="./assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-pink">
        <div class="container-fluid">
            <!-- offcanvas triger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
              </button>
            <!-- offcanvas triger -->              
        </div>
      </nav>
    <!-- Navbar -->
    <!-- Offcanvas -->      
    <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header mt-0 pb-0 mb-0 d-flex">
      <a class="navbar-brand" href="#">
        <img src="./assets/images/logo.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
        <span class="brand-text fw-bold">Maqna Hijab</span>
      </a>
    </div>
    <hr class="bg-dark">
    <div class="offcanvas-body p-0">
      <div class="user-panel mt-0 pb-0 mb-0 d-flex">
        <div class="image ">
          <img src="./assets/images/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block main-text">Admin</a>
        </div>
      </div>
      <hr class="bg-dark">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column second-text">
          <li class="nav-item bg-pink">
            <a href="?page=dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item ">
            <a href="view/order.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <span>Order</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="view/products.php" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <span>Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="view/account.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <span>Accounts</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" onclick="return confirm('Are you sure to logout?')" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <span>Log out</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
    <!-- Offcanvas -->
    <main>
        <div id="page-wrapper">
        <?php
          include('./view/dashboard.php');
        ?>
        </div>
    </main>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.6.0.js"></script>
</body>
</html>