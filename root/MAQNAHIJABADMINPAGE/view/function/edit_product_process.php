<?php 
require_once('../../config/connection.php');
require_once('../../models/database.php');
include('../../models/m_product.php');

$connection=new Database($host, $user, $pass, $db);
$prod = new Products($connection);


$id_produk= $_POST['id_produk'];

$nama_produk = $connection->conn->real_escape_string($_POST['nama_produk']);
$deskripsi_produk = $connection->conn->real_escape_string($_POST['deskripsi_produk']);
$harga_produk = $connection->conn->real_escape_string($_POST['harga_produk']);
$stok_produk = $connection->conn->real_escape_string($_POST['stok_produk']);

$pict= $_FILES['gambar_produk']['name'];
$extensi = explode(".", $_FILES['gambar_produk']['name']);
$gambar_produk = "produk-" . round(microtime(true)) . "." . end($extensi);
$sumber = $_FILES['gambar_produk']['tmp_name'];

if($pict == ''){
    $prod->edit("UPDATE tabel_produk SET nama_produk='$nama_produk', deskripsi_produk='$deskripsi_produk',
    harga_produk='$harga_produk', stok_produk='$stok_produk' WHERE id_produk='$id_produk' ");
    echo "<script>window.location='./products.php'</script>";
}else{
    $gbr_awal = $prod->tampil($id_produk)->fetch_object()->gambar_produk;
    unlink("../../../assets/gambar_produk/".$gbr_awal);
    $upload = move_uploaded_file($sumber, "../../../assets/gambar_produk/" . $gambar_produk);
    if ($upload) {
        $prod->edit("UPDATE tabel_produk SET nama_produk='$nama_produk', deskripsi_produk='$deskripsi_produk',
    harga_produk='$harga_produk', stok_produk='$stok_produk', gambar_produk='$gambar_produk' WHERE id_produk='$id_produk' ");
    echo "<script>window.location='./products.php'</script>";
    } else {
        echo "<script>alert('gagal upload gambar')</script>";
    }
    $prod->edit("UPDATE tabel_produk SET nama_produk='$nama_produk', deskripsi_produk='$deskripsi_produk',
    harga_produk='$harga_produk', stok_produk='$stok_produk', gambar_produk='$gambar_produk' WHERE id_produk='$id_produk' ");
    echo "<script>window.location='./products.php'</script>";
}
?>