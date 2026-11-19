<?php
include_once "support.php";
// include_once "destory.php";
include_once "connection.php";
// p($_POST);

if (isset($_POST['save'])) {
    $user_mobile = $_POST['u_num'];

    $user_sel = "SELECT * FROM user_detail WHERE u_mobile = '$user_mobile'";
    $user_exe = mysqli_query($conn, $user_sel);
    $user_fetch = mysqli_num_rows($user_exe);
    // p($user_fetch);

    if (isset($_POST['n_pass'])) {
        $number = $_COOKIE['user_number'];
        $new_password = $_POST['n_pass'];
        $confirm_password = $_POST['c_pass'];
        if ($new_password == $confirm_password) {
            $upd = "UPDATE user_detail SET u_password ='$new_password' WHERE u_mobile ='$number'";
            // p($upd);
            $exe = mysqli_query($conn, $upd);
            if ($exe) {
                // echo 'sucess';
                header("location:index.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/annimation.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="login-box">
        <div class="text-center fs-4" id="alt" role="alert"></div>
        <h2>Forgot password</h2>
        <form id="login_form" method="post">

            <!-- number  -->
            <div class="user-box">
                <input type="text" placeholder="Number" name="u_num" id="no">
            </div>

            <?php
            if ($user_fetch == 1) {
                // $u_num = $_POST['u_num'];
                $user_otp = random_int(1, 9999);
                setcookie('user_number', $user_mobile, time() + 180);
                setcookie('otp', $user_otp, time() + 120);

                echo "<script>alert($user_otp)</script>";
                echo "<script> console.log(document.getElementById('no').style.display='none')</script>";

            ?>
                <!-- otp  -->
                <div class="user-box">
                    <input type="text" placeholder="Enter otp" name="u_otp">
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

                    <!-- new password  -->
                    <div class="user-box">
                        <input type="password" placeholder="new password" name="n_pass">
                    </div>

                    <!-- confirm password  -->
                    <div class="user-box">
                        <input type="password" placeholder="Confirm password" name="c_pass">
                    </div>
            <?php

                }
            } ?>
            <!-- submit  -->
            <a href="#index.php" class="forgot">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input class="button" type="submit" name="save" value="submit">
            </a>

            <!-- 
                <a href="ragister.php" class="log">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="button" type="button">Sign In </button>
            </a>
            <a href="forgot_password.php" class="forgot">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="button" type="button">Forgot</button>
            </a> -->
        </form>
    </div>
</body>

</html>