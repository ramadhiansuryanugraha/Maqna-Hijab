<?php

$host = "sql202.epizy.com";
$user = "epiz_30578774";
$pass = "sGdaWtjetmxMl";
$db   = "epiz_30578774_dbmaqnahijab";
$con = mysqli_connect($host, $user, $pass, $db);

if (!$con = mysqli_connect($host, $user, $pass, $db)) {
    die("Tidak terkoneksi dengan database");
}
?>