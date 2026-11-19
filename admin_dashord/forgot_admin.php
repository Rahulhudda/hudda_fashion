<?php
include_once "support.php";
include_once "connection.php";

if (isset($_POST['save'])) {
    $admin_mobile = $_POST['u_num'];

    $admin_sel = "SELECT * FROM admin_login WHERE a_mobile = '$admin_mobile'";
    $admin_exe = mysqli_query($conn, $admin_sel);
    $admin_fetch = mysqli_num_rows($admin_exe);
    // p($admin_fetch);

    if (isset($_POST['n_pass'])) {
        $new_password = $_POST['n_pass'];
        $confirm_password = $_POST['c_pass'];
        if ($new_password == $confirm_password) {
            $upd = "UPDATE admin_login SET a_password ='$new_password'";
            $exe = mysqli_query($conn, $upd);
            if ($exe) {
                echo 'sucess';
                header("location:login.php");
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Forgot password</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form method="post">
                        <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.php" class="">
                                    <h3 class="text-primary">Forgot Password</h3>
                                </a>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no" name="u_num" placeholder="Mobile Number">
                                <label for="no">Mobile Number</label>
                            </div>

                            <?php
                            if ($admin_fetch == 1) {
                                $u_num = $_POST['u_num'];
                                $admin_otp = random_int(1, 9999);
                                setcookie('otp', $admin_otp, time() + 60);
                                echo "<script>alert($admin_otp)</script>";
                                echo "<script> console.log(document.getElementById('no').style.display='none')</script>";

                            ?>
                                <!-- otp  -->
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="floatingotp" placeholder="Enter otp" name="u_otp">
                                    <label for="floatingotp">Enter Otp</label>

                                </div>

                            <?php
                            }
                            ?>

                            <?php
                            if (isset($_POST['u_otp'])) {

                                $n_otp = $_COOKIE['otp'];

                                if ($n_otp == $_POST['u_otp']) {
                                    echo "<script> console.log(document.getElementById('no').style.display='none')</script>";

                            ?>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="new password" name="n_pass">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm password" name="c_pass">
                                        <label for="floatingPassword">Confirm Password</label>
                                    </div>

                            <?php  }
                            } ?>
                            <!-- submit  -->
                            <div class="feild">
                                <input type="submit" class="btn btn-primary py-3 w-100 mb-4" name="save" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>