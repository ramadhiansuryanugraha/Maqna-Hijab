<?php
session_start();
include("connection.php");
$del = $_GET["id"];

$sql1 = "DELETE FROM pesanan WHERE id_pesanan = $del";
$hasil = mysqli_query($con, $sql1);

if($hasil){
    header('Location: cart.php');
}
else{
    echo "gagal hapus data";
}

?>