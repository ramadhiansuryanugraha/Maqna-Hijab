<html>
<?php
session_start();
include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //YANG DIPOST
  $email_user = $_POST['email_user'];
  $password_user = $_POST['password_user'];
  if (!empty($email_user) && !empty($password_user) && !is_numeric($email_user)) {
    $query = "SELECT * FROM tabel_akun_user WHERE email_user = '$email_user' limit 1";
    $result = mysqli_query($con, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['password'] === $password) {
          $_SESSION['id_user'] = $user_data['id_user'];
          header("location:index.php");
          die;
        }
      }
    } ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
      </svg>
      <div class="warning">
        <?php echo "Email atau Password salah"; ?>
      </div>
    </div>
    <?php header("refresh:3;url=login-register.php");?>
<?php
  } 
  else {
    ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
      </svg>
      <div class="warning">
        <?php echo "Email atau Password salah"; ?>
      </div>
    </div>
    <?php header("refresh:3;url=login-register.php");?>
    <?php
  }
}
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="an onymous">
</head>
<body>
    
</body>
</html>