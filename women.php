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
<!-- women  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women Online shopping</title>
</head>

<body>
    <div class="container-fluid light-bg">
        <div class="featured-area pb-70">
            <div class="container">
                <div class="row">
                    <div class=" py-4 women1">
                        <p>
                            <span class="h_f_men fs-2">
                                <?php echo $fetch['w_heading'] ?>
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

                        $sel = "SELECT * FROM women_detail WHERE w_status = 1 limit $offset,$limit";
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
                                                        <a href="#<?php echo $data['w_image'];  ?>">
                                                            <img style="width:400px; height:400px;" src="admin_dashord/upload/<?php echo $data['w_image'];  ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="d-flex owl_slide justify-content-between position-relative overflow-hidden">
                                                        <a href="#">
                                                            <div class="addtokart p-1 px-2">
                                                                <span data-name="<?php echo $data['w_name'] ?>" data-price="<?php echo $data['w_price'] ?>" class="addcart "><i class="fa-solid fa-cart-shopping me-2"></i> Cart </span>
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
                                                            <p class="men_name"> <?php echo $data['w_name'] ?></p>
                                                            <hr>
                                                            <p class="men_price fw-bold m-0 d-flex justify-content-between">₹ <?php echo $data['w_price'] ?><span>(<?php echo $data['w_rating'] ?>)<i class="fa fa-star"></i></span></p>
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
                                    echo '<li class="page-item "><a style="font-size:19px;" class="page-link" href="women.php?page=' . ($page - 1) . ' " tabindex="-1" aria-disabled="true">Previous</a></li>';
                                }
                                for ($i = 1; $i <= $total_page; $i++) {
                                    echo '<li class="page-item"><a style="font-size:19px;" class="page-link" href="women.php?page=' . $i . '">' . $i . '</a></li>';
                                }
                                if ($total_page > $page) {
                                    echo  '<li class="page-item"><a style="font-size:19px;" class="page-link"href="women.php?page=' . ($page + 1) . ' ">Next</a> </li>';
                                }
                            }
                            ?>

                        </ul>
                    </form>

                    <!-- women procduct list section end  -->

                    <div class="container-fluid mid_dark-14 bg-white  m-0 mb-4 p-4 row">
                        Indian clothing, especially Indian women clothing, is famous the world over for its elegant,
                        ostentatious and exquisite styles. Woman’s traditional or ethic wear of Indian clothing has a
                        vast range of clothing types as per local culture, religion and climate. Sarees, Lehenga &
                        Choli, & Salwar Kameez play an integral part of the traditional clothing. Shopping for this
                        comfort wear is now easier than ever For those of you who don't live in India, buying Indian
                        clothing is now easier than ever. Now you can buy formal and casual clothes online from Bagtesh
                        fashion online shop.
                    </div>
                    <!-- womens product list end  -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include_once "footer.php";
?>