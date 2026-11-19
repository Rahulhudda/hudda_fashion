<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";

$update_id = $_GET['k_id'];

// p($fetch);

if (isset($_POST['save'])) {

    $img = $_FILES['kids_product_image'];
    $file_name = time() . rand() . $img['name'];
    $tname = $img['tmp_name'];
    $path = "upload/" . $file_name;
    move_uploaded_file($tname, $path);
    // P($_FILES);

    $kids_name = $_POST['kids_product_name'];
    $kids_price = $_POST['kids_product_price'];
    $kids_rating = $_POST['kids_product_rating'];
    $kids_invoice = $_POST['kids_product_invoice'];
    $kids_status = $_POST['status'];

    if ($img['name'] != '') {
        $kids_upd = "UPDATE kids_detail SET
        k_name = '$kids_name',
        k_price ='$kids_price',
        k_rating ='$kids_rating',
        k_invoice ='$kids_invoice',
        k_image = '$file_name', 
        k_status ='$kids_status'
        WHERE id = '$update_id'
        ";
        unlink("upload/" . $fetch['k_image']);
    } else {
        $kids_upd = "UPDATE kids_detail SET
        k_name = '$kids_name',
        k_price ='$kids_price',
        k_rating ='$kids_rating',
        k_invoice ='$kids_invoice',
        k_status ='$kids_status'
        WHERE id = '$update_id'
        ";
    }
    $kids_exe = mysqli_query($conn, $kids_upd);
    if ($kids_exe) {
        echo "Data Insterd";
        header('location:kids_viewpage.php');
    } else {
        echo "data not insert" . mysqli_error($conn);
    }
}
include_once "admin_header.php";

$update_sel = "SELECT * FROM kids_detail WHERE id ='$update_id'";
$update_exe = mysqli_query($conn, $update_sel);
$fetch = mysqli_fetch_assoc($update_exe);
// print_r($fetch);
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-ligh rounded h-100 p-4">

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <input type="text" class="form-control" name="kids_product_name" id="floatiname" value="<?php echo $fetch['k_name']?>" placeholder="kids_product">
                            <label for="floatiname">Product_Name</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="text" class="form-control" name="kids_product_price" id="floatingInput" value="<?php echo $fetch['k_price'] ?>" placeholder="price">
                            <label for="floatingInput">Product_price</label>
                        </div>
                    </div>

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form  mb-2">
                            <input type="text" class="form-control" name="kids_product_invoice" id="floatingInput" value="<?php echo $fetch['k_invoice'] ?>" placeholder="Invoice_number">
                            <label for="floatingInput">Invoice Number</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="text" class="form-control" name="kids_product_rating" id="floatingInput" value="<?php echo $fetch['k_rating'] ?>" placeholder="rating">
                            <label for="floatingInput">Product_rating</label>
                        </div>
                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-3">
                            <input type="file" class="form-control" name="kids_product_image" id="floatingimage" value="<?php echo $fetch['k_image'] ?>" placeholder="Image">
                            <label for="floatingimage">Image</label>
                            <div>
                                <img src="uplods/<?php echo $fetch['k_image'] ?>" alt="">
                            </div>
                        </div>
                        <fieldset class="row mx-sm-0 mx-lg-5 mb-2">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10 d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="1" <?php if ($fetch['k_status'] == "1") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="gridRadios3">Enable</label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios4" value="0" <?php if ($fetch['k_status'] == "0") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="gridRadios4">Disable</label>
                                </div>
                            </div>
                        </fieldset>
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