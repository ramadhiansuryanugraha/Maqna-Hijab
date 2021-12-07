<?php
session_start();
include('config/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Maqna Hijab | Admin Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/fontawesome-free/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style/adminlogin.css">

</head>

<body>
    <div class="header">
        <div class="container">
            <form method="POST" action="./view/function/loginfunction.php">
                <div class="kontenform">
                    <!--login-->
                    <div class="loginform">
                        <div class="logomaqna"><img src="./assets/images/logo.png" width="80" height="80" alt=""></div>
                        <div class="judul">Login</div>
                        <div class="inputan">
                            <div class="kotakinput">
                                <i class="fas fa-envelope"></i>
                                <input type="text" id="" name="email_admin" placeholder="Your Email" required>
                            </div>
                            <div class="kotakinput">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password_admin" placeholder="Your Password" required>
                            </div>
                            <div class="kotakinput tombol">
                            <input type="submit" name="login" placeholder="Your Password">
                            </div>
                            <div class="text login-text">Maqna Hijab Copyright © 2021 All Rights Reserved</div>
                        </div>
                    </div>

                </div>

            </form>
            
        </div>

    </div>

</body>

</html>