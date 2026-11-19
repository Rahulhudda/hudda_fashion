<?php
include_once "support.php";
// include_once "destory.php";
include_once "connection.php";


$u_number = $_POST['user_number'];
$u_password = $_POST['user_password'];

if (isset($_POST['submit'])) {
    $sel = "SELECT * FROM user_detail WHERE u_mobile ='$u_number' and u_password ='$u_password'";
    $exe = mysqli_query($conn, $sel);
    $total = mysqli_num_rows($exe);
    // echo $total;
    $fetch = mysqli_fetch_assoc($exe);
    // p($fetch);

    if ($total == 1) {
        $user_id = $fetch['id'];
        $_SESSION['ADMIN_ID']  = $user_id;
        header('location:home.php');
    }
    // p($_POST);    
};

// include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hudda Fashion </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/annimation.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="login-box">
        <div class="text-center fs-4" id="alt" role="alert"></div>
        <h2>Hudda Fashion </h2>
        <form id="login_form" method="post">
            <div class="user-box">
                <!-- <label>Username</label> -->
                <input type="text" placeholder="Please Enter Number" name="user_number" required="">
            </div>
            <div class="user-box">
                <!-- <label>Password</label> -->
                <input type="password" placeholder="Please Enter Password" name="user_password" required="">
            </div>
            <a href="#home.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input class="button" type="submit" value="Log in" name="submit">
            </a>
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
            </a>
        </form>
    </div>
</body>

</html>