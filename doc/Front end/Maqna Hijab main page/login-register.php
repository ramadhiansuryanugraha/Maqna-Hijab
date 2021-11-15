<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN | Maqna Hijab</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="an onymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://sdnjs.cloudlare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    <div class="header">
        <div class="container">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                     <img class="backimg" src="backimg.png" alt="">   
                </div>
                <div class="back">
                     <img class="depan" src="backgroundlogin.png" alt="">
                </div>
            </div>
            
            <form action="#">
                <div class="kontenform">

                    <!--login-->
                    <div class="loginform">
                        <div class="judul">Login</div>
                        <div class="inputan">
                            <div class="kotakinput">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Your Email" required>
                            </div>
                            <div class="kotakinput">
                                <i class="fas fa-envelope"></i>
                                <input type="password" placeholder="Your Password" required>
                            </div>
                            <div class="tombol kotakinput">
                                <input type="submit" value="Login">
                            </div>
                            <div class="text login-text">Don't have an account? <label for="flip"> Register now</label></div>
                        </div>
                    </div>


                    <!-- REGISTER -->
                    <div class="registerform">
                        <div class="judul">Register</div>
                        <div class="inputan">
                            <div class="kotakinput">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Your Name" required>
                            </div>
                            <div class="kotakinput">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Your Email" required>
                            </div>
                            <div class="kotakinput">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Your Handphone Number" required>
                            </div>
                            <div class="kotakinput">
                                <i class="fas fa-envelope"></i>
                                <input type="password" placeholder="Your Password" required>
                            </div>
                            <div class="tombol kotakinput">
                                <input type="submit" value="Register">
                            </div>
                            <div class="text register-text">Already have an account? <label for="flip">Login now</label></div>
                        </div>
                    </div>

                </div>

            </form>

        </div>

    </div>

</body>

</html>