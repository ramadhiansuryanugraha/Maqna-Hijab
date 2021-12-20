<!doctype html>
<html lang="en">
<?php
include("database.php");
include("addproduct.php");
include("connection.php");
include("function.php");
session_start();
?>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" href="style/katalog.css">
	<title>Maqna Hijab | Catalogues</title>
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
                    <?php if(isset($_SESSION["id_user"])) : ?>
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

	<main>
		<!-- Catalogues -->
		<section class="catalogues">
			<div class="container">
				<div class="text-products row align-items-center">
					<div class="title-product col text-center">
						<h2 class="text-main">CATALOGUES</h2>
					</div>

				</div>

				<div class="products row justify-content-center">
					<?php $ambil = $con->query("select * from tabel_produk") ?>
					<?php while ($perproduk = $ambil->fetch_assoc()) {
						$id = $perproduk['id_produk'];
					?>
						<div class="product col-12 col-sm-12 col-md-6 col-lg-3 mb-md-4 md-lg-0" data-aos="fade-up">
							<div class="bg-white">
								<div class="product-image text-center">
									<a href="detailproduk.php?id=<?php echo $id; ?>"><img src="../assets/gambar_produk/<?php echo $perproduk['gambar_produk']; ?>" alt="product" class="img-fluid"></a>
								</div>
								<div class="desc-product">
									<a href="detailproduk.php?id=<?php echo $id; ?>">
										<p class="text-second"><?php echo $perproduk['nama_produk']; ?></p>
										<p class="text-second"><?php echo $perproduk['harga_produk'] ?></p>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</section>
	</main>

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

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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