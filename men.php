<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";

$sel_query = "SELECT * FROM heading_change";
$exe_query =  mysqli_query($conn, $sel_query);
$fetch = mysqli_fetch_assoc($exe_query);
// echo $fetch;

include_once "header.php";
?>
<!-- men  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men Online shopping</title>
</head>

<body>
    <div class="container-fluid light-bg">
        <!-- men Product list start -->
        <div class="featured-area pb-70">
            <div class="container">
                <div class="row">
                    <div class=" py-4 women1">
                        <p>
                            <span class="h_f_men fs-2">
                                <?php echo $fetch['m_heading'] ?>
                            </span>
                        </p>
                    </div>
                    <!-- <div class="col-3 d-none d-lg-block">
                        <p class="fs-5">Filters</p>
                    </div> -->
                    <div class="col-lg-12 col-md-6">
                        <?php

                        $limit = 8;
                        $page = $_GET['page'];
                        if ($page != "") {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $offset = ($page - 1) * $limit;
                        $id = $offset + 1;

                        $sel = "SELECT * FROM man_detail WHERE m_status = 1 limit $offset,$limit";
                        $exe = mysqli_query($conn, $sel);

                        if ($exe) {
                            while ($data = mysqli_fetch_assoc($exe)) {
                                // p($data);
                        ?>
                                <div class="tab_content current active">
                                    <div class="tabs_item current">
                                        <div class=" tabs_content">
                                            <div class="col-lg-3 col-md-6 col-sm-2">
                                                <div class="featured-item owl_item">
                                                    <div class="featured-item-img">
                                                        <a href="#<?php echo $data['m_image'];  ?>">
                                                            <img style="width:400px; height:400px;" src="admin_dashord/upload/<?php echo $data['m_image'];  ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="d-flex owl_slide justify-content-between position-relative overflow-hidden">
                                                        <a href="#">
                                                            <div class="addtokart p-1 px-2">
                                                                <span data-name="<?php echo $data['m_name'] ?>" data-price="<?php echo $data['m_price'] ?>" class="addcart "><i class="fa-solid fa-cart-shopping me-2"></i> Cart </span>
                                                            </div>
                                                        </a>

                                                        <a href="#">
                                                            <div class="whislist px-2 p-1">
                                                                <span> Whislist </span>
                                                                <i class="fa-solid ms-2 fa-heart"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <hr>
                                                        <div class=" owl_text px-2 py-2">
                                                            <p class="men_name"> <?php echo $data['m_name'] ?></p>
                                                            <hr>
                                                            <p class="men_price fw-bold m-0 d-flex justify-content-between">₹ <?php echo $data['m_price'] ?><span>(<?php echo $data['m_rating'] ?>)<i class="fa fa-star"></i></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p id="not_found"></p>

                                        </div>
                                    </div>
                                </div>
                        <?php
                                $id++;
                            }
                        } else {
                            echo "somthing wrong" . mysqli_error($conn);
                        }
                        ?>
                    </div>
                </div>
                <form action="">
                    <ul class="pagination d-flex justify-content-center mt-3">
                        <?php
                        $sel_page = "SELECT * FROM man_detail";
                        $exe_page = mysqli_query($conn, $sel_page);
                        $fetch_page = mysqli_num_rows($exe_page);

                        if ($fetch_page > 0) {
                            $total_row = mysqli_num_rows($exe_page);
                            $total_page = ceil($total_row / $limit);
                            // echo $total_page;

                            if ($page > 1) {
                                echo '<li class="page-item "><a style="font-size:19px;" class="page-link" href="men.php?page=' . ($page - 1) . ' " tabindex="-1" aria-disabled="true">Previous</a></li>';
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                echo '<li class="page-item"><a style="font-size:19px;" class="page-link" href="men.php?page=' . $i . '">' . $i . '</a></li>';
                            }
                            if ($total_page > $page) {
                                echo  '<li class="page-item"><a style="font-size:19px;" class="page-link"href="men.php?page=' . ($page + 1) . ' ">Next</a> </li>';
                            }
                        }
                        ?>

                    </ul>
                </form>

                <!-- menprocduct list section end  -->
                <div class="container-fluid mid_dark-14 bg-white  m-0 mb-4 p-4 row">
                    India is a diverse country with different cultures and religions.
                    In special occasions like weddings or festivals you will be able
                    to find male section of the Indian society in traditional Indian
                    dresses. Men’s fashion wear from India is known for its exciting
                    array of choices, including traditional, modern and fusion clothing
                    styles.<br>
                    <h3> Bespoke tailored suits:-</h3>
                    Luxury Mens wear Tailor made , Bespoke, Made to Measure, Custom made
                    clothing is the perfect expression of who you are - or who you intend to be.
                    It's about getting what you want. Custom menswear that fits you and your lifestyle.
                    We make custom bespoke tailoring Sherwani, Jodhpuri suits, Indo Western, tuxedo suits,
                    Nehru Jacket, Blazers, trousers, Jodhpurs and shirts etc.


                </div>
                <!-- men product list end  -->
            </div>
        </div>
    </div>
</body>

</html>
<?php
include_once "footer.php";
?>