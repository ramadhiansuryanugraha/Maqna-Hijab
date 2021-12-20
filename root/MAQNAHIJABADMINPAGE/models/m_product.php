<?php 

class Products{
    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli =$conn;
    }

    public function tampil($id_produk = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tabel_produk";
        if($id_produk !=null){
            $sql .= " WHERE id_produk = $id_produk";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($nama_produk, $deskripsi_produk, $harga_produk, $stok_produk, $gambar_produk){
        $db = $this->mysqli->conn;
        $db-> query("INSERT INTO tabel_produk (nama_produk, deskripsi_produk, harga_produk, stok_produk, gambar_produk)
         VALUES ('".$nama_produk."', '".$deskripsi_produk."','".$harga_produk."', '".$stok_produk."','".$gambar_produk."')");
    }

    public function edit($sql){
        $db = $this->mysqli->conn;
        $db-> query($sql) or die ($db->error); 
    }

    public function delete($id_produk){
        $db = $this->mysqli->conn;
        $db-> query("DELETE FROM tabel_produk WHERE id_produk='$id_produk'");
    }
    function __destruct(){
        $db = $this->mysqli->conn;
        $db->close();
    }
}
?>
