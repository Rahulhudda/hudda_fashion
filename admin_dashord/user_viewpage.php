<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";

// active / decative 
// p($_GET);
$u_status = $_GET['status'];
$u_id = $_GET['user_id'];

if ($u_status != '') {
    $updt_query = "UPDATE user_detail SET 
        u_status ='$u_status'
        WHERE id ='$u_id'
    ";
    $updt_exe = mysqli_query($conn, $updt_query);
}


// delete 
$delete_id = $_GET['d_id'];
// echo $delete_id;
if ($delete_id !== '') {
    $sel_query = "SELECT * FROM user_detail WHERE id='$delete_id'";
    $exe_query = mysqli_query($conn, $sel_query);
    $fetch = mysqli_fetch_assoc($exe_query);
    // p($fetch);
    unlink("upload/" . $fetch['u_image']);

    $delete_query = "DELETE FROM user_detail WHERE id='$delete_id'";
    $delete_exe = mysqli_query($conn, $delete_query);
    // if ($delete_exe) {
    //     echo 'delete success';
    // } else {
    //     echo 'not success';
    // }
}


include_once "admin_header.php"
?>
<div class="col-12 mt-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">User Deatils</h6>
        <div class="table-responsive">
            <table class="table">
                <form action="" method="post">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Image</th>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">City</th>
                            <th scope="col">Address</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Password</th>
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

                        $sel = "SELECT * FROM user_detail WHERE 1=1 $where $order limit $offset,$limit";
                        $exe = mysqli_query($conn, $sel);

                        if ($exe) {
                            while ($fetch = mysqli_fetch_assoc($exe)) {
                                // p($fetch);
                        ?>

                                <tr>

                                    <td><?php echo $fetch['id'] ?></td>
                                    <td><?php echo $fetch['u_name'] ?></td>
                                    <td><?php echo $fetch['u_email'] ?></td>
                                    <td><?php echo $fetch['u_mobile'] ?></td>
                                    <td><img src="upload/<?php echo $fetch['u_image'] ?>" style="width:30px; height:30px;" alt=""></td>
                                    <td><?php echo $fetch['country'] ?></td>
                                    <td><?php echo $fetch['states'] ?></td>
                                    <td><?php echo $fetch['city'] ?></td>
                                    <td><?php echo $fetch['u_address'] ?></td>
                                    <td><?php echo $fetch['u_gender'] ?></td>
                                    <td>
                                        <?php
                                        if ($fetch['u_status'] == 1) {
                                        ?>
                                            <a href="user_viewpage.php?user_id=<?php echo $fetch['id']; ?>&status=0">
                                                <button type="button" class="  rounded-circle p-2 bg-success">
                                                    <i class="fa-solid fa-user-check"></i>
                                                    <!-- <i class="fa-solid fa-check"></i> -->
                                                </button>
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="user_viewpage.php?user_id=<?php echo $fetch['id']; ?>&status=1">
                                                <button type="button" class="  rounded-circle p-2 bg-danger">
                                                    <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                                                    <i class="fa-solid fa-user-xmark"></i>
                                                </button>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href="user_updatepage.php?u_id=<?php echo $fetch['id']; ?>">
                                            <button type="button" class="  rounded-circle p-1 bg-success"><i class="fa-solid fa-pen-to-square"></i></button>
                                        </a>
                                        <a href="user_viewpage.php?d_id=<?php echo $fetch['id']; ?>" class="mx-1">
                                            <button type="button" class=" text-danger bg-light rounded-circle p-1"><i class="fa-solid fa-trash"></i></button>
                                        </a>
                                    </td>
                                    <td><?php echo $fetch['u_password'] ?></td>
                                    <td><?php echo $fetch['create_at'] ?></td>
                                    <td><?php echo $fetch['updated_at'] ?></td>
                                </tr>
                        <?php
                                $id++;
                            }
                        } else {
                            echo "somthing wrong";
                        }
                        ?>
                    </tbody>
                </form>
            </table>
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
                            echo '<li class="page-item "><a class="page-link" href="user_viewpage.php?page=' . ($page - 1) . ' " tabindex="-1" aria-disabled="true">Previous</a></li>';
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            echo '<li class="page-item"><a class="page-link" href="user_viewpage.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($total_page > $page) {
                            echo  '  <li class="page-item"><a class="page-link"href="user_viewpage.php?page=' . ($page + 1) . ' ">Next</a> </li>';
                        }
                    }
                    ?>

                </ul>
            </form>
        </div>
    </div>
</div>

<?php include_once "admin_footer.php" ?>