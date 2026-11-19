<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";

// enable / disable

$w_status = $_GET['status'];
$w_id = $_GET['women_id'];

if ($w_status != '') {
    $updt_query = "UPDATE women_detail SET 
        w_status ='$w_status'
        WHERE id ='$w_id'
    ";
    $updt_exe = mysqli_query($conn, $updt_query);
}

// delete 

$delete_id = $_GET['d_id'];
// echo $delete_id;

if ($delete_id !== '') {
    $sel_query = "SELECT * FROM women_detail WHERE id='$delete_id'";
    $exe_query = mysqli_query($conn, $sel_query);
    $fetch = mysqli_fetch_assoc($exe_query);

    // p($fetch);
    unlink("upload/" . $fetch['w_image']);

    $delete_query = "DELETE FROM women_detail WHERE id='$delete_id'";
    $delete_exe = mysqli_query($conn, $delete_query);
    // if ($delete_exe) {
    //     echo 'delete success';
    // } else {
    //     echo 'not success';
    // }
}


// multipal delete
if (isset($_POST['delete'])) {
    if (isset($_POST['del'])) {
        $del_id = $_POST['del'];
        // p($del_id);
        $count = count($del_id);
        // echo $count;

        for ($i = 0; $i < $count; $i++) {

            $sel_query = "SELECT * FROM women_detail WHERE id='$del_id[$i]'";
            $exe_query = mysqli_query($conn, $sel_query);
            $fetch = mysqli_fetch_assoc($exe_query);
            // p($fetch);
            unlink("upload/" . $fetch['w_image']);
        }
        $delet_id = implode(",", $del_id);
        // echo $delet_id;

        $del_query = "Delete FROM women_detail WHERE id in($delet_id)";
        $exe = mysqli_query($conn, $del_query);
    }
}
// P($_FILES);




include_once "admin_header.php";

?>
<div class="col-12 mt-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Women Product</h6>
        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <?php
            $sel_total = "SELECT COUNT(*) AS Total_product FROM women_detail";
            $exe_total = mysqli_query($conn, $sel_total);
            $fetch_total = mysqli_fetch_assoc($exe_total);

            $sel_active = "SELECT COUNT(*) AS active_product FROM women_detail WHERE w_status = 1";
            $exe_active = mysqli_query($conn, $sel_active);
            $fetch_active = mysqli_fetch_assoc($exe_active);

            $sel_inactive = "SELECT COUNT(*) AS inactive_product FROM women_detail WHERE w_status = 0";
            $exe_inactive = mysqli_query($conn, $sel_inactive);
            $fetch_inactive = mysqli_fetch_assoc($exe_inactive);

            $sel_sale = "SELECT SUM(w_price) AS Total_sale FROM women_detail";
            $exe_sale = mysqli_query($conn, $sel_sale);
            $fetch_sale = mysqli_fetch_assoc($exe_sale);

            $sel_min = "SELECT MIN(w_price) AS min_sale FROM women_detail";
            $exe_min = mysqli_query($conn, $sel_min);
            $fetch_min = mysqli_fetch_array($exe_min);

            $sel_max = "SELECT MAX(w_price) AS max_sale FROM women_detail";
            $exe_max = mysqli_query($conn, $sel_max);
            $fetch_max = mysqli_fetch_array($exe_max);

            $sel_rat = "SELECT MIN(w_rating) AS min_Rating FROM women_detail";
            $exe_rat = mysqli_query($conn, $sel_rat);
            $fetch_rat = mysqli_fetch_array($exe_rat);

            $sel_rating = "SELECT MAX(w_rating) AS max_Rating FROM women_detail";
            $exe_rating = mysqli_query($conn, $sel_rating);
            $fetch_rating = mysqli_fetch_array($exe_rating);
            ?>
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-brands fa-product-hunt fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0">Total Product</p>
                            <h6 class="mb-0"><?php echo $fetch_total['Total_product'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0">Total Sale</p>
                            <h6 class="mb-0">₹ <?php echo $fetch_sale['Total_sale'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-check fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0"> Active Proudct</p>
                            <h6 class="mb-0"><?php echo $fetch_active['active_product'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-xmark fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0"> Inactive Proudct</p>
                            <h6 class="mb-0"><?php echo $fetch_inactive['inactive_product'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-arrow-down fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0">Min-price</p>
                            <h6 class="mb-0"><?php echo $fetch_min['min_sale'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-arrow-up fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0">Max-price</p>
                            <h6 class="mb-0"><?php echo $fetch_max['max_sale'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-regular fa-star fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0">Min-Rating</p>
                            <h6 class="mb-0"><?php echo $fetch_rat['min_Rating'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa-solid fa-star fa-3x text-primary"></i>
                        <div class="ms-0">
                            <p class="mb-0">Max-Rating</p>
                            <h6 class="mb-0"><?php echo $fetch_rating['max_Rating'] ?></h6>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <!-- Sale & Revenue End -->
        <div class="table-responsive">
            <table class="table">
                <form action="" method="post">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input id="check-all" type="checkbox" id="checkboxes">
                                <!-- <label for="check-all">All</label> -->
                                <!-- <i class="fa-solid fa-trash"></i>
                                <input type="submit" name="delete" value="" class="btn btn-danger multi_delete"> -->
                                <button type="submit" name="delete" value="" class="btn btn-danger multi_delete"> <i class="fa-solid fa-trash delete"></i></button>
                            </th>
                            <th scope="col">Sr.no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Inv No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Creatat</th>
                            <th scope="col">updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $limit = 4;
                        $page = $_GET['page'];
                        if ($page != "") {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $offset = ($page - 1) * $limit;
                        $id = $offset + 1;

                        $sel = "SELECT * FROM women_detail WHERE 1=1 $where $order limit $offset,$limit";
                        $exe = mysqli_query($conn, $sel);

                        if ($exe) {
                            while ($fetch = mysqli_fetch_assoc($exe)) {
                                // p($fetch);
                        ?>

                                <tr>
                                    <td>
                                        <input type="checkbox" value="<?php echo $fetch['id']; ?>" name="del[]" class="checkboxes">
                                    </td>
                                    <td><?php echo $fetch['id'] ?></td>
                                    <td><?php echo $fetch['w_name'] ?></td>
                                    <td><?php echo $fetch['w_price'] ?></td>
                                    <td><?php echo $fetch['w_rating'] ?></td>
                                    <td><?php echo $fetch['w_invoice'] ?></td>
                                    <td><img src="upload/<?php echo $fetch['w_image'] ?>" style="width:40px; height:40px;" alt=""></td>
                                    <td> <?php
                                            if ($fetch['w_status'] == 1) {
                                            ?>
                                            <a href="women_viewpage.php?women_id=<?php echo $fetch['id']; ?>&status=0">
                                                <button type="button" class="  rounded-circle p-2 bg-success">
                                                    <i class="fa-solid fa-shirt"></i>
                                                </button>
                                            </a>
                                        <?php
                                            } else {
                                        ?>
                                            <a href="women_viewpage.php?women_id=<?php echo $fetch['id']; ?>&status=1">
                                                <button type="button" class="  rounded-circle p-2 bg-danger">
                                                    <i class="fa-solid fa-shirt"></i>
                                                </button>
                                            </a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href="women_updatepage.php?w_id=<?php echo $fetch['id']; ?>">
                                            <button type="button" class="  rounded-circle p-1 bg-success"><i class="fa-solid fa-pen-to-square"></i></button>
                                        </a>
                                        <a href="women_viewpage.php?d_id=<?php echo $fetch['id']; ?>" class="mx-1">
                                            <button type="button" class=" text-danger bg-light rounded-circle p-1"><i class="fa-solid fa-trash"></i></button>
                                        </a>
                                    </td>
                                    <td><?php echo $fetch['create_at'] ?></td>
                                    <td><?php echo $fetch['updated_at'] ?></td>
                                </tr>
                        <?php
                                $id++;
                            }
                        } else {
                            echo "somthing wrong" . mysqli_error($conn);
                        }
                        ?>
                    </tbody>
                </form>
            </table>
            <form action="">
                <ul class="pagination d-flex justify-content-center mt-3">
                    <?php
                    $sel_page = "SELECT * FROM women_detail";
                    $exe_page = mysqli_query($conn, $sel_page);
                    $fetch_page = mysqli_num_rows($exe_page);

                    if ($fetch_page > 0) {
                        $total_row = mysqli_num_rows($exe_page);
                        $total_page = ceil($total_row / $limit);
                        // echo $total_page;

                        if ($page > 1) {
                            echo '<li class="page-item "><a class="page-link" href="women_viewpage.php?page=' . ($page - 1) . ' " tabindex="-1" aria-disabled="true">Previous</a></li>';
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="women_viewpage.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($total_page > $page) {
                            echo  '  <li class="page-item"><a class="page-link"href="women_viewpage.php?page=' . ($page + 1) . ' ">Next</a> </li>';
                        }
                    }
                    ?>

                </ul>
            </form>
        </div>
    </div>
</div>

<?php include_once "admin_footer.php" ?>