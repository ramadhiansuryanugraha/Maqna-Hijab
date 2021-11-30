<?php
require_once('../config/koneksi.php');
include('../models/database.php');
include('../models/m_product.php');

$sql1        = "SELECT * FROM tabel_akun_admin";
$execute1    = mysqli_query($koneksi, $sql1);

$sql2        = "SELECT * FROM tabel_akun_user";
$execute2    = mysqli_query($koneksi, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maqna Hijab | admin page</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style/account.css">
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-pink">
        <div class="container-fluid">
            <!-- offcanvas triger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- offcanvas triger -->
        </div>
    </nav>
    <!-- Navbar -->
    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header mt-0 pb-0 mb-0 d-flex">
            <a class="navbar-brand" href="#">
                <img src="../assets/images/logo.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
                <span class="brand-text fw-bold">Maqna Hijab</span>
            </a>
        </div>
        <hr class="bg-dark">
        <div class="offcanvas-body p-0">
            <div class="user-panel mt-0 pb-0 mb-0 d-flex">
                <div class="image ">
                    <img src="../assets/images/logo.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block main-text">Admin</a>
                </div>
            </div>
            <hr class="bg-dark">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column second-text">
                    <li class="nav-item ">
                        <a href="../index.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="order.php" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <span>Order</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="products.php" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="nav-item bg-pink">
                        <a href="account.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <span>Accounts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Offcanvas -->
    <main>
        <!-- admin account -->
        <h1 class="main-text fw-bold pt-3 ms-2">Accounts </h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end add-btn">
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#tambahakun">Add Admin Account</button>
        </div>
        <!-- Modal add admin -->
        <div class="modal fade" id="tambahakun" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-pink">
                        <h5 class="modal-title main-text" id="edit">Add Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-add">
                        <form action="" method="POST">
                            <input type="hidden" name="id_admin" id="id_admin1">
                            <div class="form-group">
                                <label for="nama_admin" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" name="nama_admin" id="nama_admin1" required placeholder="Input Name">
                            </div>
                            <div class="form-group">
                                <label for="email_admin" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email_admin1" name="email_admin" required placeholder="Input Email Addres">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="form-group">
                                <label for="nohp_amdin" class="form-label">Admin Phone Number</label>
                                <input type="text" class="form-control" name="nohp_admin" id="nohp_admin1" required placeholder="Input Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="password_admin" class="form-label">pasword</label>
                                <input type="password" class="form-control" name="password_admin" id="password_admin1" required placeholder="Input Password">
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="simpan" class="btn btn-success">Add Account</button>
                            </div>
                        </form>
                    </div>

                    <?php
                    if (isset($_POST['simpan'])) {
                        $nama_admin       = $_POST['nama_admin'];
                        $email_admin       = $_POST['email_admin'];
                        $nohp_admin     = $_POST['nohp_admin'];
                        $password_admin      = $_POST['password_admin'];

                        mysqli_query($koneksi, "INSERT INTO tabel_akun_admin VALUES('','$nama_admin','$email_admin', '$nohp_admin', '$password_admin')")

                            or die(mysqli_error($koneksi));

                        echo "<div align='center'><h5> Please wait, Adding data process.. </h5></div>";
                        echo "<meta http-equiv='refresh' content='1; url=account.php'>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <table class="table admin-tbl">
            <thead>
                <h5 class="table-title"> Admin Account</h5>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin Phone Number</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $admin_no = 1;
                while ($result1 = mysqli_fetch_assoc($execute1)) {
                ?>
                    <tr>
                        <td data-label="No"><?php echo $admin_no++ ?></td>
                        <td data-label="Name"><?= $result1['nama_admin'] ?></td>
                        <td data-label="Email"><?= $result1['email_admin'] ?></td>
                        <td data-label="Admin Phone Number"><?= $result1['nohp_admin'] ?></td>
                        <td data-label="Password"><?= $result1['password_admin'] ?></td>
                        <td data-label="Action">
                            <a id="edit_akun" data-bs-toggle="modal" data-bs-target="#editakun" class="btn btn-primary" data-id="<?= $result1['id_admin'] ?>" data-name="<?= $result1['nama_admin'] ?>" data-email="<?= $result1['email_admin'] ?>" data-nohp="<?= $result1['nohp_admin'] ?>" data-pass="<?= $result1['password_admin'] ?>"><i class="fa fa-edit"></i> Edit</a>
                            <a href="?del=<?= $result1['id_admin'] ?>" onclick="return confirm('apakah anda yakin mau menghapus data ini?')" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php
                } ?>
                <!-- Modal edit -->
                <div class="modal fade" id="editakun" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-pink">
                                <h5 class="modal-title main-text" id="edit">Edit Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="function/editadminacc.php" method="POST">
                                <div class="modal-body" id="modal-edit">
                                    <input type="hidden" name="id_admin" id="id_admin">
                                    <div class="form-group">
                                        <label for="nama_admin" class="form-label">Admin Name</label>
                                        <input type="text" class="form-control" name="nama_admin" id="nama_admin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_admin" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email_admin" name="email_admin" required>
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp_admin" class="form-label">Admin Phone Number</label>
                                        <input type="text" class="form-control" name="nohp_admin" id="nohp_admin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_admin" class="form-label">pasword</label>
                                        <input type="password" class="form-control" name="password_admin" id="password_admin" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="editdata" class="btn btn-success editbtn">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>


        </tbody>
        </table>
        <!-- user account -->
        <table class="table user-tbl">
            <thead>
                <h5 class="table-title"> User Account</h5>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user_no = 1;
                while ($result2 = mysqli_fetch_assoc($execute2)) {
                ?>
                    <tr>
                        <td data-label="No"><?php echo $user_no++ ?></td>
                        <td data-label="Name"><?= $result2['nama_user'] ?></td>
                        <td data-label="Email"><?= $result2['email_user'] ?></td>
                        <td data-label="Phone_number"><?= $result2['nohp_user'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#edit_akun", function() {
            var id_admin = $(this).data('id');
            var nama_admin = $(this).data('name');
            var email_admin = $(this).data('email');
            var nohp_admin = $(this).data('nohp');
            var password_admin = $(this).data('pass');

            $("#modal-edit #id_admin").val(id_admin);
            $("#modal-edit #nama_admin").val(nama_admin);
            $("#modal-edit #email_admin").val(email_admin);
            $("#modal-edit #nohp_admin").val(nohp_admin);
            $("#modal-edit #password").val(password_admin);
        })
    </script>
    <?php
    if(isset($_GET['del'])){
        
        mysqli_query($koneksi, "DELETE FROM tabel_akun_admin WHERE id_admin='$_GET[del]'");
        echo "<meta http-equiv='refresh' content='1; url=account.php'>";
        ?> 
    <?php
       
    }
    ?>

</body>

</html>