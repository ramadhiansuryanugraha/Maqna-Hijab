<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Maqna Hijab | Login & Registration</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="an onymous">
    <link rel="stylesheet" href="https://sdnjs.cloudlare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style/loginregister.css">

</head>

<body>
<?php
session_start();
include("connection.php");
include("function.php");
?>
    <div class="header">
        <div class="container">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <img class="backimg" src="assets/images/backimg.png" alt="">
                </div>
                <div class="back">
                    <img class="depan" src="assets/images/backgroundlogin.png" alt="">
                </div>
            </div>
            <div class="forms">
                <div class="kontenform">
                    <!--lOGIN-->
                    <div class="loginform">
                        <div class="judul">Login</div>
                        <form action="loginfunction.php" method="POST">
                            <div class="inputan">
                                <div class="kotakinput">
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" placeholder="Your Email" name="email_user" required>
                                </div>
                                <div class="kotakinput">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" placeholder="Your Password" name="password_user" required>
                                </div>
                                <div class="tombol kotakinput">
                                    <input type="submit" value="Login">
                                </div>
                                <div class="text login-text">Don't have an account? <label for="flip"> Register now</label></div>
    
                                <div class="text login-text">Start your journey at <label><a href="index.php"> Maqna Hijab</a></label></div>
                            </div>
                        </form>
                    </div>


                    <!-- REGISTER -->
                    <div class="registerform">
                        <div class="judul">Register</div>
                        <form action="registerfunction.php" method="POST">
                            <div class="inputan">
                                <div class="kotakinput">
                                    <i class="fas fa-user"></i>
                                    <input type="text" placeholder="Your Name" name="nama_user" required>
                                </div>
                                <div class="kotakinput">
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" placeholder="Your Email" name="email_user" required>
                                </div>
                                <div class="kotakinput">
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" placeholder="Your Handphone Number" name="nohp_user" required>
                                </div>
                                <div class="kotakinput">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" placeholder="Your Password" name="password_user" required>
                                </div>
                                <div class="tombol kotakinput">
                                    <input type="submit" value="Register">
                                </div>
                                <div class="text register-text">Already have an account? <label for="flip">Login now</label></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>

</html>