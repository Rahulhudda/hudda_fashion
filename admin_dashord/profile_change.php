<?php
include_once "support.php";
// include_once "destory.php";
include_once "connection.php";

$update_sel = "SELECT * FROM admin_login ";
$update_exe = mysqli_query($conn, $update_sel);
$fetch = mysqli_fetch_assoc($update_exe);
// p($fetch);

if (isset($_POST['save'])) {
    $img = $_FILES['admin_image'];
    $file_name = time() . rand() . $img['name'];
    $tname = $img['tmp_name'];
    $path = "upload/" . $file_name;
    move_uploaded_file($tname, $path);

    $gender   = $_POST['gender'];
    $name     = $_POST['admin_name'];
    $email    = $_POST['admin_email'];
    $mobile   = $_POST['admin_mobile'];
    $password = $_POST['admin_password'];
    $code     = $_POST['admin_code'];
    $adderss  = $_POST['admin_address'];

    if ($img['name'] != '') {
        $user_upd = "UPDATE admin_login SET
        a_gender  ='$gender',
        a_name    ='$name',
        a_email   ='$email',
        a_mobile  ='$mobile',
        a_image = '$file_name', 
        a_code      =' $code ',
        a_password='$password',
        a_address ='$adderss'
        -- WHERE id = '$update_id'
        ";
        unlink("upload/" . $fetch['a_image']);
    } else {
        $user_upd = "UPDATE admin_login SET
        a_gender  ='$gender',
        a_name    ='$name',
        a_email   ='$email',
        a_mobile  ='$mobile',
        a_code      =' $code ',
        a_password='$password',
        a_address ='$adderss'
        -- WHERE id = '$update_id'
        ";
    }
    $user_exe =  mysqli_query($conn, $user_upd);
    // p($user_exe);
    if ($user_exe) {
        echo "Data Insterd";
        header('location:profile.php');
    } else {
        echo  mysqli_error($conn);
    }
}


include_once "admin_header.php";
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <h2>Admin Profile Page</h2>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-ligh rounded h-100 p-4">
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10 d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" <?php if ($fetch['a_gender'] == "Male") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                <label class="form-check-label" for="gridRadios1">Male</label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" <?php if ($fetch['a_gender'] == "Female") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                <label class="form-check-label" for="gridRadios2">Female</label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="Other" <?php if ($fetch['a_gender'] == "Other") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                <label class="form-check-label" for="gridRadios3">Other</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <input type="text" class="form-control" name="admin_name" id="floatiname" placeholder="name" value="<?php echo $fetch['a_name'] ?>">
                            <label for="floatiname">Name</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="email" class="form-control" name="admin_email" id="floatingInput" placeholder="Email address" value="<?php echo $fetch['a_email'] ?>">
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form  mb-2">
                            <input type="number" class="form-control" name="admin_mobile" id="floatimobile" placeholder="Mobile" value="<?php echo $fetch['a_mobile'] ?>">
                            <label for="floatimobile">Mobile No</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <!-- <input type="password" class="form-control" name="admin_password" id="floatingPassword" placeholder="Password" value="<?php echo $fetch['a_password'] ?>">
                            <label for="floatingPassword">Password</label> -->
                        </div>
                    </div>

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <input type="text" class="form-control" name="admin_code" id="floaticode" placeholder="code" value="<?php echo $fetch['a_code'] ?>">
                            <label for="floatingcode">Code</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-3">
                            <textarea class="form-control" placeholder="Address" name="admin_address" id="floatingTextarea" style="height:50px;"><?php echo $fetch['a_address'] ?></textarea>
                            <label for="floatingTextarea">Adderss</label>
                        </div>
                    </div>

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-3">
                            <input type="file" class="form-control" name="admin_image" value="<?php echo $fetch['a_image'] ?>" id="floatingimage" placeholder="Image">
                            <label for="floatingimage">Image</label>
                            <div>
                                <img src="uplods/<?php echo $fetch['a_image'] ?>" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="d-flex  flex-sm-row flex-column justify-content-center m-4">
                        <input type="submit" class="btn btn-info" name="save" value="submit">
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<?php include_once "admin_footer.php" ?>