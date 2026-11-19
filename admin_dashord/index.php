<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";


include_once "admin_header.php"

?>

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <!-- total sale  -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <?php
                //'man_detail' table
                $sel_man = "SELECT SUM(m_price) AS men_sale FROM man_detail";
                $exe_man = mysqli_query($conn, $sel_man);
                $fetch_man = mysqli_fetch_assoc($exe_man);

                //'women_detail' table
                $sel_women = "SELECT SUM(w_price) AS women_sale FROM women_detail";
                $exe_women = mysqli_query($conn, $sel_women);
                $fetch_women = mysqli_fetch_assoc($exe_women);

                //'kids_detail' table
                $sel_kids = "SELECT SUM(k_price) AS kids_sale FROM kids_detail";
                $exe_kids = mysqli_query($conn, $sel_kids);
                $fetch_kids = mysqli_fetch_assoc($exe_kids);

                // Calculate the total sale by adding sales from all three tables
                $total_sale = $fetch_man['men_sale'] + $fetch_women['women_sale'] + $fetch_kids['kids_sale'];
                ?>
                <div class="ms-3">
                    <p class="mb-2">Total Sale</p>
                    <h6 class="mb-0">₹ <?php echo $total_sale; ?></h6>
                </div>
            </div>
        </div>

        <!-- men sale  -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-user fa-3x text-primary"></i>
                <?php
                $sel_men = "SELECT SUM(m_price) AS men_sale FROM man_detail";
                $exe_men = mysqli_query($conn, $sel_men);
                $fetch_men = mysqli_fetch_assoc($exe_men);
                ?>
                <div class="ms-3">
                    <p class="mb-2">Men sale</p>
                    <h6 class="mb-0">₹ <?php echo $fetch_men['men_sale'] ?></h6>
                </div>
            </div>
        </div>

        <!-- women sale  -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-person-dress fa-3x text-primary"></i>
                <?php
                $sel_women = "SELECT SUM(w_price) AS women_sale FROM women_detail";
                $exe_women = mysqli_query($conn, $sel_women);
                $fetch_women = mysqli_fetch_assoc($exe_women);
                ?>
                <div class="ms-3">
                    <p class="mb-2">Women Sale</p>
                    <h6 class="mb-0">₹ <?php echo $fetch_women['women_sale'] ?></h6>

                </div>
            </div>
        </div>

        <!-- kids sale  -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-duotone fa-child fa-3x text-primary"></i>
                <?php
                $sel_kids = "SELECT SUM(k_price) AS kids_sale FROM kids_detail";
                $exe_kids = mysqli_query($conn, $sel_kids);
                $fetch_kids = mysqli_fetch_assoc($exe_kids);
                ?>
                <div class="ms-3">
                    <p class="mb-2">Kids Sale</p>
                    <h6 class="mb-0">₹ <?php echo $fetch_kids['kids_sale'] ?></h6>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Recent Sales Start -->
<!-- <div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Date</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Jan 2045</td>
                        <td>INV-0123</td>
                        <td>Rahul hudda</td>
                        <td>$123</td>
                        <td>Paid</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Jan 2045</td>
                        <td>INV-0123</td>
                        <td>Rahul hudda</td>
                        <td>$123</td>
                        <td>Paid</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Jan 2045</td>
                        <td>INV-0123</td>
                        <td>Rahul hudda</td>
                        <td>$123</td>
                        <td>Paid</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Jan 2045</td>
                        <td>INV-0123</td>
                        <td>Rahul hudda</td>
                        <td>$123</td>
                        <td>Paid</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>01 Jan 2045</td>
                        <td>INV-0123</td>
                        <td>Rahul hudda</td>
                        <td>$123</td>
                        <td>Paid</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> -->
<!-- Recent Sales End -->

<?php include_once "admin_footer.php" ?>