<?php
include_once "support.php";
include_once "connection.php";


if (isset($_POST['save'])) {
    // $img = $_FILES['user_image'];
    // $file_name = time() .rand() . $img['name'];
    // $tname = $img['tmp_name'];
    // $path = "upload/" . $file_name;
    // move_uploaded_file($tname, $path);
    // p($_FILES);

    $gender   = $_POST['gander'];
    $name     = $_POST['u_name'];
    $email    = $_POST['u_email'];
    $mobile   = $_POST['u_mobile'];
    $password = $_POST['u_password'];
    // $country  = $_POST['u_country'];
    // $state    = $_POST['u_state'];
    // $city     = $_POST['u_city'];
    $adderss  = $_POST['u_address'];

    $user_ins = "INSERT INTO user_detail SET
    u_gender  ='$gender',
    u_name    ='$name',
    u_email   ='$email',
    u_mobile  ='$mobile',
    -- u_image = '$file_name', 
    -- country   ='$country',
    -- states    ='$state',
    -- city      =' $city ',
    u_password='$password',
    u_address ='$adderss'

    ";

    $user_exe = mysqli_query($conn, $user_ins);
    if ($user_exe) {
        header('location:login.php');
        // echo "Data Insterd";
    }
    //  else {
    //     echo 'Data is not Insterd' . mysqli_error($conn);
    // }
}


// include_once "header.php";
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
    <div class="login-box register">
        <h2>Register Page </h2>
        <form method="post">
            <!-- <div class="user_box">
            <label>gander</label>
            Male<input type="radio" name="gander" value="Male" required="">
            Female<input type="radio" name="gander" value="Female" required="">
            Other<input type="radio" name="gander" value="Other" required="">
        </div> -->
            <div class="user-box">
                <!-- <label>Username</label> -->
                <input type="text" placeholder="Username" name="u_name" required="">
            </div>
            <div class="user-box">
                <!-- <label>Password</label> -->
                <input type="password" placeholder="Password" name="u_password" required="">
            </div>
            <div class="user-box">
                <!-- <label>Mobile No</label> -->
                <input type="text" placeholder="Mobile No" name="u_mobile" required="">
            </div>
            <div class="user-box">
                <!-- <label>Email</label> -->
                <input type="email" placeholder="Email" name="u_email" required="">
            </div>
            <div class="user-box">
                <!-- <label>address</label> -->
                <textarea name="u_address" placeholder="address" class="textarea" id="" cols="20" rows="1" required=""></textarea>
            </div>
            <!-- <div class="user-box">
                <select name="u_country" id="">
                    <option>
                        < ---- Select Country ----- >
                    </option>
                    <option>India</option>
                    <option>Usa</option>
                    <option>Chaina</option>
                    <option>Pakisthan</option>
                    <option>Australia</option>
                    <option>Japan</option>
                </select>
            </div>
            <div class="user-box">
                <select name="u_state" id="">
                    <option>
                        < ---- Select State ----- >
                    </option>
                    <option>Rajsthan</option>
                    <option>Harina</option>
                    <option>Panjab</option>
                    <option>Gujart</option>
                    <option>Maharstra</option>
                    <option>Goa</option>
                </select>
            </div>
            <div class="user-box">
                <select name="u_city" id="">
                    <option>
                        < ---- Select city ----- >
                    </option>
                    <option>Jodhpur</option>
                    <option>Jaipur</option>
                    <option>Chru</option>
                    <option>Udaipur</option>
                    <option>Bhilwada</option>
                    <option>Bikaner</option>
                    <option>Ajmer</option>
                </select>
            </div> -->
            <a href="index.php" class="log" style="margin-left: 110px;">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input class="button" type="submit" value="submit" name="save">
            </a>
        </form>
    </div>
</body>

</html>