<?php
include('../../config/connection.php');
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'dbmaqnahijab');

if(isset($_POST['editdata']))
    $id_pembayaran = $_POST['id_pembayaran'];
    $kode_order = $_POST['id_pemesan'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $email_pemesan = $_POST['email_pemesan'];
    $nohp_pemesan = $_POST['nohp_pemesan'];
    $alamat_pemesan =$_POST['alamat_pemesan'];
    $harga_pesanan = $_POST['harga_pesanan'];
    $status_pembayaran = $_POST['status_pembayaran'];

    $query= "UPDATE tabel_pembayaran SET id_pemesan='$kode_order', nama_pemesan='$nama_pemesan', email_pemesan='$email_pemesan',
        nohp_pemesan='$nohp_pemesan', alamat_pemesan='$alamat_pemesan', harga_pesanan='$harga_pesanan', status_pembayaran='$status_pembayaran' WHERE id_pembayaran='$id_pembayaran'";
        $query_run =mysqli_query($connection,$query);
    
        if($query_run){
            echo '<script>alert("Data Edited")</script>';
            header("location:../order.php");
            
        }else{
            echo '<script>alert("Data  Not Edited")</script>';
        }
?>