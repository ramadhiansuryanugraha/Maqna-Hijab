<?php
session_start();
require_once('../config/connection.php');
include('../models/database.php');
if(!isset($_SESSION["email_admin"])){
  header("location: ../adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maqna Hijab | admin page</title>
  
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/style/style.css">
  <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
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
        <img src="../assets/images/logo.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
        <span class="brand-text fw-bold">Maqna Hijab</span>
      </a>
    </div>
    <hr class="bg-dark">
    <div class="offcanvas-body p-0">
      <div class="user-panel mt-0 pb-0 mb-0 d-flex">
        <div class="image ">
          <img src="../assets/images/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block main-text">Admin</a>
        </div>
      </div>
      <hr class="bg-dark">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column second-text">
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item bg-pink">
            <a href="order.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <span>Order</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <span>Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="account.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <span>Accounts</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" onclick="return confirm('Are you sure to logout?')" class="nav-link">
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
    <h1 class="main-text fw-bold pt-3 ms-2">Orders</h1>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Order Code</th>
          <th>Buyer</th>
          <th>Address</th>
          <th>Product</th>
          <th>Proof of Payment</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql        = "SELECT * FROM tabel_pembayaran";
        $execute    = mysqli_query($con, $sql);
        $no = 1;
        while ($result = mysqli_fetch_array($execute)) {
        ?>
          <tr>
            <td data-label="No"><?php echo $no++ ?></td>
            <td data-label="Order Code"><?= $result['id_pembayaran'] ?> </td>
            <td data-label="Buyer">
              <small ><?= $result['nama_pemesan'] ?></small><br>
              <small ><?= $result['email_pemesan'] ?></small><br>
              <small ><?= $result['nohp_pemesan'] ?></small><br>
            </td>
            <td data-label="Address"><?= $result['alamat_pemesan'] ?></td>
            <td data-label="Product">
              <img src="../../assets/gambar_produk/<?= $result['gambar_produk_pesanan']; ?>" class="product-img"><br>
              <small>Name: <?= $result['produk_pesanan'] ?> </small><br>
              <small>Price: <?= $result['harga_pesanan'] ?></small><br>
              <small>Quantity: <?= $result['qty'] ?></small>
              <small>Color: <?= $result['warna_pesanan'] ?></small>
            </td>
            <td data-label="Proof Of Payment">
              <img src="../../assets/bukti_pembayaran/<?= $result['bukti_pembayaran'] ?>" style="height: 200px; width: 200px;">
            </td>
            <td data-label="Action">
              <a href="?del=<?= $result['id_pembayaran'] ?>" onclick="return confirm('apakah anda yakin mau menghapus data ini?')" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>

        <?php
        }
        ?>
      </tbody>
    </table>
  </main>

  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery-3.6.0.js"></script>
  <?php
  if (isset($_GET['del'])) {
    mysqli_query($con, "DELETE FROM tabel_pembayaran WHERE id_pembayaran='$_GET[del]'");
    echo "<meta http-equiv='refresh' content='1; url=order.php'>";
  } ?>
</body>

</html>