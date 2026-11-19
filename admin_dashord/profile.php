<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";


$sel = "SELECT * FROM admin_login";
$exe = mysqli_query($conn, $sel);
$fetch = mysqli_fetch_assoc($exe)


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmin Profile</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <!-- Admin Css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/mobile.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
            <li>
                <a href="logout.php">
                    <span>Log out<i class="fa fa-sign-out-alt fa-1x mx-1"></i></span>

                </a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav d-lg-block d-none">
        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Admin Profile</a>
            </div>

        </div>
        <div class="profile mt-5">
            <img src="upload/<?php echo $fetch['a_image'] ?>" alt="" width="100" height="100">
            <hr>

            <div class="name">
                Admin Name
            </div>
            <div class="job">
                <?php echo $fetch['a_name'] ?>
            </div>
            <hr>
        </div>

    </div>
    <div class="slide_mobile_nav d-lg-none">
        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Admin Profile</a>
            </div>

        </div>
        <div class="profile">
            <img src="upload/<?php echo $fetch['a_image'] ?>" alt="" width="100" height="100">
            <hr>
            <div class="name">
                Admin Name
            </div>
            <div class="job">
                <?php echo $fetch['a_name'] ?>
            </div>
            <hr>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <a href="profile_change.php">
                    <i class="fa fa-pen fa-xs edit"></i>
                </a>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $fetch['a_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $fetch['a_email'] ?></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>:</td>
                            <td><?php echo $fetch['a_mobile'] ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?php echo $fetch['a_gender'] ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><?php echo $fetch['a_password'] ?></td>
                        </tr> -->
                        <tr>
                            <td>Code</td>
                            <td>:</td>
                            <td><?php echo $fetch['a_code'] ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $fetch['a_address'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h2>SOCIAL MEDIA</h2>
        <div class="card w-100">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <div class="social-media d-flex">
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <a href="https://www.facebook.com/login/">
                            <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <a href="https://www.instagram.com/">
                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-invision fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
</body>

</html>