<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("connection.php");
include("function.php");
$user_data = check_login($con);

if (!isset($_SESSION["id_user"])) {
    echo "<script>location = 'login-register.php'</script>";
}

$id_pemesan = $_SESSION["id_user"];
$shipping = 12000;

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/cart.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <title>Maqna Hijab | Cart</title>
</head>

<body>
    <header>
        <nav class="main-nav">
            <div class="brand text-main">
                <a href="index.php">
                    <h1>MAQNA</h1>
                </a>
            </div>

            <div class="links">
                <ul>
                    <li><a href="#"></a></li>
                    <li><a href="katalog.php">Catalogues</a></li>
                    <li><a href="tatacarapembayaran.php">Payment Method</a></li>
                    <?php if (isset($_SESSION["id_user"])) : ?>
                        <li>
                            <a href="logout.php" onclick="return confirm('Are you sure to logout?')">
                                Logout
                            </a>
                        </li>
                        <li>
                            <a href="userorder.php">Your Order</a>
                        </li>
                </ul>
            </div>

            <div class="icon-for-user">
            <?php else : ?>
                <a href="login-register.php">
                    <img src="assets/icons/person.svg" alt="person">
                </a>
            <?php endif ?>
            <a href="cart.php">
                <img src="assets/icons/shop-bag.svg" alt="person">
            </a>
            </div>
            <div class="menu">
                <img src="assets/icons/menu.svg" alt="menu">
            </div>
        </nav>
    </header><!-- /header -->


    <main>
        <div class="small-container cart-page">
            <div class="text-main">
                <h1 class="cartjudul">
                    Your Order
                </h1>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Address</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <?php
                ?>
                <?php
                $no = 1;
                $id_checkout = $_GET["id"];
                $ambil = $con->query("select * from pesanan where id_pesanan = '$id_checkout'");
                while ($row = $ambil->fetch_array()) {
                    $id_pesanan = $row["id_pesanan"];
                    $harga_perproduk = ($row["harga_pesanan"] - $shipping)/$row["qty"];
                ?>

                    <tbody>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row["id_pesanan"]; ?></td>
                            <td>
                                <div class="cart-info">
                                    <img src="../MAQNAHIJAB/assets/images/gambar_produk/<?php echo $row["gambar_produk_pesanan"]; ?>  " width="60" height="60">
                                    <div>
                                        <small><?php echo $row["produk_pesanan"];?></small>
                                        <br>
                                        <small>Price : <?php echo $harga_perproduk;?></small>
                                        <br>
                                        <small>Shipping : Rp. <?php echo $shipping;?> </small>
                                    </div>
                                </div>
                            </td>
                            <td> <?php echo $row["qty"]; ?></td>
                            <td><?php echo $row["alamat_pemesan"]; ?></td>
                            <td>Rp. <?php echo $row["harga_pesanan"] ?></td>
                        </tr>
                    </tbody>
            </table>
        </div>




        <br>
        <br>
        <br>
        <div class="small-container">
            <div class="text-main">
                <h1 class="cartjudul">
                    Form of Payment
                </h1>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <p>
                            Pay Rp. <?php echo $row["harga_pesanan"];?> to
                            <strong>
                                Pay Your Payment at BCA(******) GOPAY(******) OVO(******)
                            </strong>
                        </p>
                    </div>
                </div>
            </div>



            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  readonly value="<?php echo $row["nama_pemesan"]; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  readonly value="<?php echo $row["email_pemesan"]; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly value="<?php echo $row["nohp_pemesan"]; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly value="<?php echo $row["alamat_pemesan"]; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <h4>Payment Proof</h4>
                            <p>Upload your payment proof</p>
                            <i class="fas fa-envelope"></i>
                            <input type="file" name="bukti_pembayaran" class="upload-box" value="bukti_pembayaran">
                            <br>
                            <br>
                            <input type="submit" class="btn btn-primary" name="checkout" value="Upload">
                        </div>
                    </div>
                    <br>
                </div>
            </form>

            <?php
                    if (isset($_POST['checkout'])) {
                        $id_pembayaran = $row["id_pesanan"];
                        $id_produk_pembayaran = $row["id_produk"];
                        $id_pemesan = $_SESSION["id_user"];
                        $nama_pemesan = $row["nama_pemesan"];
                        $email_pemesan = $row["email_pemesan"];
                        $nohp_pemesan = $row["nohp_pemesan"];
                        $alamat_pemesan = $row["alamat_pemesan"];
                        $produk_pesanan = $row["produk_pesanan"];
                        $gambar_produk_pesanan = $row["gambar_produk_pesanan"];
                        $qty = $row["qty"];
                        $harga_pesanan = $row["harga_pesanan"];
                        $status_pembayaran = "Wait for confirmation";

                        $direktori = "../MAQNAHIJAB/assets/images/bukti_pembayaran/";
                        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
                        move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $direktori . $bukti_pembayaran);
                        $con->query("INSERT INTO tabel_pembayaran(id_pembayaran, id_produk, id_pemesan,  nama_pemesan, email_pemesan, nohp_pemesan, alamat_pemesan, produk_pesanan, gambar_produk_pesanan, qty, harga_pesanan, bukti_pembayaran, status_pembayaran) VALUES('$id_pembayaran','$id_produk_pembayaran','$id_pemesan','$nama_pemesan','$email_pemesan','$nohp_pemesan','$alamat_pemesan','$produk_pesanan','$gambar_produk_pesanan','$qty','$harga_pesanan','$bukti_pembayaran','$status_pembayaran')");
                        
                        
                        $del = $row["id_pesanan"];
                        $sql1 = "DELETE FROM pesanan WHERE id_pesanan = $del";
                        $hasil = mysqli_query($con, $sql1);
                        if($hasil){
                            echo "<script>alert('Your order is succesfull');</script>";
                            echo "<script>location='userorder.php'</script>";
                        }
                        else{
                            echo "Your order is failed";
                        } 
                        
                    }
            ?>

        <?php } ?>
        </div>
    </main>
    <!--main-->

    <br>

    <footer>
        <div class="container">
            <div class="footer-content row mb-4">
                <div class="footer-brand col-12 col-sm-12 col-md-3 col-lg-3">
                    <div>
                        <h1 class="text-main">Maqna</h1>
                    </div>
                </div>

                <div class="footer-items-box col-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="footer-items row">
                        <div class="footer-item col-12 col-sm-12 col-md-4">
                            <div>
                                <div class="footer-item-content">
                                    <h3 class="text-main">About Us</h3>
                                    <p><a href="aboutourshop.php">Maqna Hijab</a> was created with the aim of giving meaning to everyone that success cannot be hindered by anything, including the pandemic.</p>
                                </div>
                            </div>
                        </div>

                        <div class="footer-item col-12 col-sm-12 col-md-4">
                            <div>
                                <div class="footer-item-content">
                                    <h3 class="text-main">Contact Us</h3>
                                    <p>maqnahijab.id@gmail.com</p>
                                    <p>+6285159552612</p>
                                    <p>Kebon Jeruk, Jakarta Barat</p>
                                </div>
                            </div>
                        </div>

                        <div class="footer-item col-12 col-sm-12 col-md-4">
                            <div>
                                <div class="footer-item-content">
                                    <h3 class="text-main">Social Media</h3>
                                    <a href="https://www.instagram.com/maqna_id/" class="ig-icon">
                                        <img src="assets/images/instagram.png" alt="ig" class="img-fluid">
                                        <p>@maqna_id</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright-section border-top">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-content text-center mt-4">
                            <p class="text-second">Maqna Hijab Copyright &copy; 2021 All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="library/bootstrap/js/bootstrap.min.js"></script>
    <script src="script/index.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>