<?php

function check_login($con)
{
    if (isset($_SESSION['id_user'])) {
        $id = $_SESSION['id_user'];
        $query = "SELECT * FROM tabel_akun_user WHERE id_user = '$id' limit 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //MAU KE LOGIN
?>
<?php
    echo "<script>alert('You must login first to continue');</script>";
    echo "<script>location='login-register.php'</script>";
}

function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}

?>