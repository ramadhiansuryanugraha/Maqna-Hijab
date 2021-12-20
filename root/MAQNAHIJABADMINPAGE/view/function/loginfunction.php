<?php
session_start();
require_once('../../config/connection.php');

if(isset($_POST['login'])){
    if(!empty($_POST['email_admin']) || !empty(md5($_POST['password_admin']))){
        $query = "SELECT * FROM tabel_akun_admin WHERE email_admin='".$_POST['email_admin']."'
         AND password_admin='".md5($_POST['password_admin'])."' ";
         $result=mysqli_query($con,$query);
         if(mysqli_fetch_assoc($result)){
             $_SESSION['email_admin'] = $_POST['email_admin'];
             header("location:../../index.php");
         }
         else{
            echo '<script> 
            alert("Ooops email or password is incorrect \Please try again");
            window.location.href="../../adminlogin.php";
       </script>';
         }
    }
}else{
    echo 'not working';
};

?>