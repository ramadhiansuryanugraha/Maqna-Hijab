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
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div class="warning">
            <?php echo "You Must Login First to Continue Your Journey"; ?>
        </div>
    </div>
<?php
    header("location: login-register.php");
    die;
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