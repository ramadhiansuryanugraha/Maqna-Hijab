<?php
include('../../config/connection.php');
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'dbmaqnahijab');

if(isset($_POST['editdata']))
    $id_admin = $_POST['id_admin'];
    $nama_admin = mysqli_real_escape_string($con, $_POST['nama_admin']);
    $email_admin = mysqli_real_escape_string($con, $_POST['email_admin']);
    $nohp_admin = mysqli_real_escape_string($con, $_POST['nohp_admin']);
    $password_admin =md5($_POST['password_admin']);
    $cpass = md5($_POST['cpass']);
    if ($password_admin != $cpass) {
        echo '<script>alert("Password not match")</script>';
        header("location:../account.php");
    } else {
        $query= "UPDATE tabel_akun_admin SET nama_admin='$nama_admin', email_admin='$email_admin',
        nohp_admin='$nohp_admin', password_admin='$password_admin' WHERE id_admin='$id_admin'";
        $query_run =mysqli_query($con,$query);
    
        if($query_run){
            echo '<script>alert("Data Edited")</script>';
            header("location:../account.php");
            
        }else{
            echo '<script>alert("Data  Not Edited")</script>';
            header("location:../account.php");
        }
    }
?>