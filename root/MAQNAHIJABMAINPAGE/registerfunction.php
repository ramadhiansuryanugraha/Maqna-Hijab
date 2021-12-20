<html>
<?php
session_start();
include("function.php");
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //YANG DIPOST
    $nama_user = $_POST['nama_user'];
    $email_user = $_POST['email_user'];
    $nohp_user = $_POST['nohp_user'];
    $password_user = md5($_POST['password_user']);
    $userid = random_num(20);

    $check = "SELECT * FROM tabel_akun_user WHERE email_user = '$email_user'";
    $checkres = mysqli_query($con, $check);
    $result = mysqli_num_rows($checkres);

    if ($result == 1) { ?>
        
<?php
        echo "<script>alert('Email already taken');</script>";
        header("refresh:1;url=login-register.php");
    } else {
        $query = "INSERT INTO tabel_akun_user (id_user, nama_user, email_user, nohp_user, password_user) VALUES ('$userid','$nama_user', '$email_user', '$nohp_user', '$password_user')";
        mysqli_query($con, $query);
        header("Location: login-register.php");
    }
}
?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="an onymous">
</head>
<body>
    
</body>
</html>