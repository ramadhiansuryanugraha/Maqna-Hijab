<!doctype html>
<html lang="en">

<?php
session_start();
require_once 'database.php';
include("connection.php");
include("addproduct.php");
include("function.php");

$id_produk = $_GET["id"];
if(filter_var($id_produk, FILTER_VALIDATE_INT) === false){
    die("No valid id");
}
$shipping = 12000;
$sql_query = "SELECT * FROM tabel_produk WHERE id_produk = $id_produk";
$result = $con->query($sql_query);

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3d51ce54db.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" href="style/detail.css">
    <link rel="stylesheet" href="style/paymentkatalog.css">
    <title>Maqna Hijab | Product Detail</title>
</head>

<body class="bg-white">
    <!--HEADER SESSION-->
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
                            <a href="userorder.php">Your Order</a>
                        </li>
                        <li>
                            <a href="logout.php" onclick="return confirm('Are you sure to logout?')">
                                Logout
                            </a>
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




    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <!--MAIN SESSION-->
            <main class="container-fluid">
                <!-- Preview Product Detail -->
                <section class="container-product row product-detail-section">
                    <div class="product-image-detail col-12 col-sm-12 col-md-6 px-0">
                        <div class="product-image-thumb">
                            <img src="../assets/gambar_produk/<?php echo $row['gambar_produk']; ?>" alt="sweater-appreal" class="img-fluid">
                        </div>
                    </div>

                    <!-- Description Detail Product -->
                    <div class="product-detail-desc col-12 col-sm-12 col-md-6 pr-md-0">
                        <div class="product-desc-content d-flex flex-column">
                            <div class="order-0 order-md-0">
                                <h1 class="text-main primary-col font-weight-bold"> <?php echo $row["nama_produk"]; ?> </h1>
                            </div>


                            <div class="price-product-detail order-1 order-md-2">
                                <div class="price-judul text-second secondary-col">PRICE</div>
                                <div class="price-product text-second primary-col font-weight-bold">
                                    <?php echo $row["harga_produk"]; ?>
                                </div>
                            </div>

                            <div class="desc-product-detail order-3 order-md-3 mt-2">
                                <div class="desc-judul text-main primary-col">DESCRIPTION</div>
                                <p class="text-second secondary-col">
                                    <?php echo $row["deskripsi_produk"]; ?>
                                </p>
                            </div>

                            <?php if (isset($_SESSION["id_user"])) : ?>

                                <!-- Button trigger modal/ORDER THE PRODUCT -->
                                <div class="btn-product-detail order-4 order-md-4">
                                    <div class="button-group">
                                        <button type="button" class="btn btn-cart-detail text-main text-white btn-rounded font-weight-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>


                                <!-- Modal/FORMULIR UNTUK ORDER THE PRODUCT -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <form method="POST">
                                                    <img src="assets/images/logo.png" width="60" height="60">
                                                    <h1>Your Order</h1>
                                                    <div class="small-container cart-page">
                                                        <table>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Quantity</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="cart-info">
                                                                        <img src="assets/images/bergo.jpg">
                                                                        <div>
                                                                            <p><?php echo $row["nama_produk"]; ?></p>
                                                                            <small>Price: Rp. <?php echo $row["harga_produk"]; ?></small>
                                                                            <br>
                                                                            <small>Shipping: Rp. <?php echo $shipping; ?></small>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><input type="number" value="1" name="jumlah"></td>
                                                                <td><small> Rp. <?php echo $row["harga_produk"] + $shipping ?></small></td>
                                                            </tr>
                                                        </table>
                                                        <div class="kontenform">
                                                            <!--paymentform-->
                                                            <div class="paymentform">
                                                                <div class="inputan">
                                                                    <div class="kotakinput">
                                                                        <i class="fas fa-envelope"></i>
                                                                        <input type="text" placeholder="Your Full Name" name="nama_pemesan" required>
                                                                    </div>
                                                                    <div class="kotakinput">
                                                                        <i class="fas fa-envelope"></i>
                                                                        <input type="text" placeholder="Your Email" name="email_pemesan" required>
                                                                    </div>
                                                                    <div class="kotakinput">
                                                                        <i class="fas fa-envelope"></i>
                                                                        <input type="text" placeholder="Your Handphone Number" name="nohp_pemesan" required>
                                                                    </div>
                                                                    <div class="kotakinput">
                                                                        <i class="fas fa-envelope"></i>
                                                                        <input type="text" placeholder="Your Colour of Order" name="warna_pesanan" required>
                                                                    </div>
                                                                    <div class="kotakinput">
                                                                        <i class="fas fa-envelope"></i>
                                                                        <input type="text" placeholder="Your Address (Full Address)" name="alamat_pemesan" required>
                                                                    </div>
                                                                    <div class="tombol kotakinput">
                                                                        <input type="submit" value="Order" name="order">
                                                                    </div>
                                                                    <div class="text login-text">Maqna Hijab Copyright © 2021 All Rights Reserved</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                if (isset($_POST["order"])) {
                                    $id_pesanan = random_num(10);
                                    $id_produk_pesanan = $row["id_produk"];
                                    $id_pemesan = $_SESSION["id_user"];
                                    $nama_pemesan = $_POST["nama_pemesan"];
                                    $email_pemesan = $_POST["email_pemesan"];
                                    $nohp_pemesan = $_POST["nohp_pemesan"];
                                    $warna_pesanan = $_POST["warna_pesanan"];
                                    $alamat_pemesan = $_POST["alamat_pemesan"];
                                    $produk_pesanan = $row["nama_produk"];
                                    $gambar_produk_pesanan = $row["gambar_produk"];
                                    $qty_pesanan = $_POST["jumlah"];
                                    $harga_pesanan = $qty_pesanan * $row["harga_produk"] + $shipping;
                                    $query = "INSERT INTO pesanan (id_pesanan, id_produk, id_pemesan, nama_pemesan, nohp_pemesan, email_pemesan, alamat_pemesan, produk_pesanan, gambar_produk_pesanan, qty, warna_pesanan, harga_pesanan) 
                                    VALUES ('".$id_pesanan."', '".$id_produk_pesanan."', '".$id_pemesan."', '".$nama_pemesan."', '".$nohp_pemesan."', '".$email_pemesan."',
                                     '".$alamat_pemesan."','".$produk_pesanan."', '".$gambar_produk_pesanan."', '".$qty_pesanan."', '".$warna_pesanan."', '".$harga_pesanan."')";
                                    mysqli_query($con,$query )or 
                                    die(mysqli_error($con));
                                    echo "<script>alert('Product has been added to your CART');</script>";
                                    echo "<script>location='cart.php';</script>";
                                }
                                ?>

                            <?php else : ?>
                                <div class="btn-product-detail order-4 order-md-4">
                                    <div class="button-group">
                                        <a href="login-register.php">
                                            <button type="button" class="btn btn-cart-detail text-main text-white btn-rounded font-weight-bold">
                                                BUY NOW
                                            </button>
                                        </a>
                                    </div>
                                </div>

                            <?php endif ?>
                        </div>
                    </div>
                </section>

            </main>
            <!--/main-->
    <?php

        }
    }

    ?>




    <!-- FOOTER SESSION -->
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



    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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