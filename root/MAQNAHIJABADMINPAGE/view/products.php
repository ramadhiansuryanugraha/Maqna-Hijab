<?php
session_start();
require_once('../config/connection.php');
include('../models/database.php');
include('../models/m_product.php');
if(!isset($_SESSION["email_admin"])){
  header("location: ../adminlogin.php");
}
$connection = new Database($host, $user, $pass, $db);
$prod = new Products($connection);


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
          <li class="nav-item ">
            <a href="order.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <span>Order</span>
            </a>
          </li>
          <li class="nav-item bg-pink">
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
    <h1 class="main-text fw-bold pt-3 ms-2">Products </h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end add-btn mb-2">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">
        Add Product
      </button>
    </div>
    <!-- add product -->
    <div class="modal fade" id="tambah" aria-labelledby="tambah_produk" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title main-text" id="tambah_produk">Add Product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="nama_produk" class="control-label">Product Name</label>
                <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
              </div>
              <div class="form-group">
                <label for="deskripsi_produk" class="control-label">Product Description</label>
                <input type="text" name="deskripsi_produk" class="form-control" id="deskripsi_produk" required>
              </div>
              <div class="form-group">
                <label for="harga_produk" class="control-label">Product Price</label>
                <input type="number" name="harga_produk" class="form-control" id="harga_produk" required>
              </div>
              <div class="form-group">
                <label for="stok_produk" class="control-label">Product Stock</label>
                <input type="number" name="stok_produk" class="form-control" id="stok_produk" required>
              </div>
              <div class="form-group">
                <label for="gambar_produk" class="control-label">Product Image</label>
                <input type="file" name="gambar_produk" class="form-control" id="gambar_produk" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Reset</button>
              <input type="submit" class="btn btn-success" name="tambah" value="Save">
            </div>
          </form>
          <?php
          if (@$_POST['tambah']) {
            $nama_produk = $connection->conn->real_escape_string($_POST['nama_produk']);
            $deskripsi_produk = $connection->conn->real_escape_string($_POST['deskripsi_produk']);
            $harga_produk = $connection->conn->real_escape_string($_POST['harga_produk']);
            $stok_produk = $connection->conn->real_escape_string($_POST['stok_produk']);

            $extensi = explode(".", $_FILES['gambar_produk']['name']);
            $gambar_produk = "produk-" . round(microtime(true)) . "." . end($extensi);
            $sumber = $_FILES['gambar_produk']['tmp_name'];
            $upload = move_uploaded_file($sumber, "../../assets/gambar_produk/". $gambar_produk);
            if ($upload) {
              $prod->tambah($nama_produk, $deskripsi_produk, $harga_produk, $stok_produk, $gambar_produk);
            } else {
              echo "<script>alert('gagal upload gambar')</script>";
            }
          }
          ?>
        </div>
      </div>
    </div>
    <!-- show table product -->
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Image</th>
          <th>Product Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $tampil = $prod->tampil();
        while ($data = $tampil->fetch_object()) {
        ?>
          <tr>
            <td data-label="No"><?php echo $no++; ?></td>
            <td data-label="Image">
              <img class="product-img" alt="Product" src="../../assets/gambar_produk/<?php echo $data->gambar_produk; ?>">
            </td>
            <td data-label="Product Name"> <?php echo $data->nama_produk; ?></td>
            <td data-label="Description"><?php echo $data->deskripsi_produk; ?></td>
            <td data-label="Price">Rp. <?php echo $data->harga_produk; ?></td>
            <td data-label="Stock"><?php echo $data->stok_produk; ?></td>
            <td data-label="Action">
              <a id="edit_produk" data-bs-toggle="modal" data-bs-target="#edit" 
                      data-id="<?php echo $data->id_produk; ?>" 
                      data-nama="<?php echo $data->nama_produk; ?>" 
                      data-deskripsi="<?php echo $data->deskripsi_produk; ?>" 
                      data-harga="<?php echo $data->harga_produk; ?>" 
                      data-stok="<?php echo $data->stok_produk; ?>" 
                      data-gambar="<?php echo $data->gambar_produk; ?>">
                <button class="btn btn-primary mb-1"><i class="fa fa-edit"></i> Edit</button></a>
              <a href="?del&id=<?php echo $data->id_produk ?>" onclick="return confirm('Are you sure to delete?')">
                <button class="btn btn-danger mb-1"><i class="fa fa-trash"></i> Delete</button></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <!-- Edit Produk -->
    <div class="modal fade" id="edit" aria-labelledby="edit_produk" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title main-text" id="edit_produk">Edit Product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="form" enctype="multipart/form-data">
            <div class="modal-body" id="modal-edit">
              <div class="form-group">
                <label for="nama_produk" class="control-label">Product Name</label>
                <input type="hidden" name="id_produk" id="id_produk">
                <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
              </div>
              <div class="form-group">
                <label for="deskripsi_produk" class="control-label">Product Description</label>
                <input type="text" name="deskripsi_produk" class="form-control" id="deskripsi_produk" required>
              </div>
              <div class="form-group">
                <label for="harga_produk" class="control-label">Product Price</label>
                <input type="number" name="harga_produk" class="form-control" id="harga_produk" required>
              </div>
              <div class="form-group">
                <label for="stok_produk" class="control-label">Product Stock</label>
                <input type="number" name="stok_produk" class="form-control" id="stok_produk" required>
              </div>
              <div class="form-group">
                <label for="gambar_produk" class="control-label">Product Images</label>
                <div style="padding-bottom: 10px;">
                  <img src="" class="product-img" id="pict" alt="">
                </div>
                <input type="file" name="gambar_produk" class="form-control" id="gambar_produk">
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="../js/jquery-3.6.0.js"></script>
    <script type="text/javascript">
      $(document).on("click", "#edit_produk", function() {
        var id_produk = $(this).data('id');
        var nama_produk = $(this).data('nama');
        var desk_produk = $(this).data('deskripsi');
        var harga_produk = $(this).data('harga');
        var stok_produk = $(this).data('stok');
        var gambar_produk = $(this).data('gambar');
        $("#modal-edit #id_produk").val(id_produk);
        $("#modal-edit #nama_produk").val(nama_produk);
        $("#modal-edit #deskripsi_produk").val(desk_produk);
        $("#modal-edit #harga_produk").val(harga_produk);
        $("#modal-edit #stok_produk").val(stok_produk);
        $("#modal-edit #pict").attr("src","../../assets/gambar_produk/"+gambar_produk );
      }); 

      $(document).ready(function(e){
        $("#form").on("submit", (function(e){
          e.preventDefault();
          $.ajax({
            url:'function/edit_product_process.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg){
              $('.table').html(msg);
            }
          })
        }));
      });
    </script>
  <?php
    if(isset($_GET['del'])){
      $gbr_awal = $prod->tampil($_GET['id'])->fetch_object()->gambar_produk;
      unlink('../../assets/gambar_produk/'.$gbr_awal);
        mysqli_query($con, "DELETE FROM tabel_produk WHERE id_produk='$_GET[id]'");
        echo "<meta http-equiv='refresh' content='1; url=products.php'>";      
    }?>

  </main>


  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>