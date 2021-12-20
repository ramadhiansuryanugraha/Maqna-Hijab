<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include("connection.php");
	session_start();
	?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/about-us.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<title>Maqna Hijab | About Our Shop</title>
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

	<div class="section">
		<div class="container">
			<div class="content-section">
				<div class="title">
					<h1>About Our Shop</h1>
				</div>
				<div class="content">
					<p>As a response to the phenomenon of reduced livelihoods due to the impact of the global
						pandemic, we started making Maqna Hijab and successfully launched it in 2021. Maqna Hijab
						was created with the aim of giving meaning to everyone that success cannot be hindered by
						anything, including the pandemic.</p>
					<p>In interpreting life, everyone certainly has a different perspective. Some people say that success
						is when you reach the desired career. Some people also say that success is when you are
						happy in doing everything. The designs and materials of our products are adapted to the
						meaning of life for everyone. Therefore, our products can make users comfortable in any
						activity.</p>
					<p>We believe that wearing hijab will not prevent someone from achieving success. However, hijab
						can bring success and give meaning to every component of life. So, make your life more
						meaningful with Maqna Hijab.</p>
				</div>
			</div>
			<div class="image-section">
				<img src="assets/images/logo.png">
			</div>
		</div>
	</div>

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