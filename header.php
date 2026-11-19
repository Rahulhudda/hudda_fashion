<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hudda Fashion Point</title>

    <!-- favicon link  -->
    <link rel="icon" type="image" href="images/logo/favicon.png">

    <!-- cart jquery link -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css"> -->

    <!-- mega menu link  -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- bootstarp css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- font-awesome all css link  -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <!-- slider css link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- css  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">

    <!-- responsive  -->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>

    <div class="container-fluid p-0  ">
        <!-- header start  -->
        <header class="container-fluid  header d-none d-lg-block">
            <div class="container py-1">
                <div class="row justify-content-between ">
                    <div class=" col-xl-6 col-md-6">
                        <div class="contant_us">
                            Contact us 24/7 :
                            <a href="tel:+91-7878068656" title="Call Us"> +91-7878068656</a>
                            <span>&nbsp; / &nbsp;</span>
                            <a href="mailto:info@huddafashion.com" title="Mail Us">info@Huddafashion.com</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12">
                        <ul class="contant_us d-flex ">
                            <li>
                                <a title="Free Shipping All Over India"> FREE SHIPPING ALL OVER INDIA</a>
                            </li>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <li>
                                <a href="index.php" title="login us">LOGIN </a>
                                <span>&nbsp; / &nbsp;</span>
                                <a href="ragister.php" title="Register">REGISTER</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- navbar start  -->
        <section class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid m-0 p-0 mega_menu">
                    <div class="container  m-0 p-0  d-flex justify-content-around menu">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fa-solid fa-bars"></i></span>
                        </button>
                        <a class="navbar-brand" href="home.php"><img src="images/logo/logos.png " class="logo" alt=""></a>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

                            <a class="navbar-brand  d-block d-lg-none " href="#">
                                <button type="button" class="btn-close d-lg-none p-3 d-block" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                <img src="images/logo/logos.png " class="togollogo" alt=""></a>
                            <div class="navbar-nav tabs">
                                <!-- <p class="text-center d-lg-none d-block"><a class="nav-link active" aria-current="page" href="user_profile.php">Profile</a></p> -->
                                <p class="text-center"><a class="nav-link active" aria-current="page" href="home.php">All</a></p>
                                <p class="text-center"><a class="nav-link active" aria-current="page" href="men.php">Men</a></p>
                                <p class="text-center"><a class="nav-link active" aria-current="page" href="women.php">Women</a></p>
                                <p class="text-center"><a class="nav-link active" aria-current="page" href="kids.php">kids</a></p>
                                <p class="text-center d-lg-none d-block"><a class="nav-link active" aria-current="page" href="index.php">login</a></p>
                                <p class="text-center d-lg-none d-block"><a class="nav-link active" aria-current="page" href="ragister.php">Register</a></p>
                                <p class="text-center d-lg-none d-block"><a class="nav-link active" aria-current="page" href="logout.php">Log Out</a></p>
                            </div>
                        </div>

                        <!-- search  -->
                        <a class="navbar-brand" href="#">
                            <form class="form-inline my-2 my-lg-0 ">
                                <div class="searchBox"><i class="fa fa-search"></i>
                                    <input type="search" placeholder="Search" id="search_field" aria-label="Search" autofocus>
                                </div>
                            </form>
                        </a>
                        <a class="navbar-brand " href="#">
                            <i class="fas fa-shopping-cart carts total-count mx-lg-4"></i>
                        </a>
                        <!-- <a class="navbar-brand d-none d-lg-block" href="user_profile.php"><i class="fa-regular fa-user"></i></a> -->

                    </div>
                </div>
            </nav>
        </section>