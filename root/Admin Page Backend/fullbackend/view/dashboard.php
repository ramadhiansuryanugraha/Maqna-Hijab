<?php
// Jumlah akun user
$data_akun_user = mysqli_query($con,"SELECT * FROM tabel_akun_user");
$jumlah_akun_user = mysqli_num_rows($data_akun_user);
// Jumlah produk
$data_produk = mysqli_query($con,"SELECT * FROM tabel_produk");
$jumlah_produk = mysqli_num_rows($data_produk);
// Jumlah Orderan
$data_order = mysqli_query($con,"SELECT * FROM tabel_pembayaran");
$jumlah_order = mysqli_num_rows($data_order);
?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold">
                    <h1 class="main-text fw-bold">Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo $jumlah_produk; ?></h3>
        
                        <p>Products </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="view/products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3><?php echo $jumlah_akun_user; ?></h3>
        
                        <p>User Registrations</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="view/account.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?php echo $jumlah_order; ?></h3>
        
                        <p>Users Make Order</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="view/order.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
            </div>
        </div>
   