<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "dbmaqnahijab";
$con = mysqli_connect($host, $user, $pass, $db);

if (!$con = mysqli_connect($host, $user, $pass, $db)) {
    die("Tidak terkoneksi dengan database");
}
?>