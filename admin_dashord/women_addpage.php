<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";

// p($_POST);
if (isset($_POST['save'])) {

    $img = $_FILES['women_product_image'];
    $file_name = time() . rand() . $img['name'];
    $tname = $img['tmp_name'];
    $path = "upload/" . $file_name;
    move_uploaded_file($tname, $path);
    P($file_name);

    $women_name = $_POST['women_product_name'];
    $women_price = $_POST['women_product_price'];
    $women_rating = $_POST['women_product_rating'];
    $women_invoice = $_POST['women_product_invoice'];
    $women_status = $_POST['status'];

    $women_ins = "INSERT INTO women_detail SET
    
    w_name = '$women_name',
    w_price ='$women_price',
    w_rating ='$women_rating',
    w_invoice ='$women_invoice',
    w_image = '$file_name', 
    w_status ='$women_status'
    ";
    $women_exe = mysqli_query($conn, $women_ins);
    // if($women_exe){
    //     echo "data success";
    // }
    // else{
    //     echo "not success";
    // }

}
include_once "admin_header.php"
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <h5>women add page</h5>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-ligh rounded h-100 p-4">

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <input type="text" class="form-control" name="women_product_name" id="floatiname" placeholder="women_product">
                            <label for="floatiname">Product_Name</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="text" class="form-control" name="women_product_price" id="floatingInput" placeholder="price">
                            <label for="floatingInput">Product_price</label>
                        </div>
                    </div>

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form  mb-2">
                            <input type="text" class="form-control" name="women_product_invoice" id="floatingInput" placeholder="Invoice_number">
                            <label for="floatingInput">Invoice Number</label>
                        </div>

                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="text" class="form-control" name="women_product_rating" id="floatingInput" placeholder="rating">
                            <label for="floatingInput">Product_rating</label>
                        </div>
                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-3">
                            <input type="file" class="form-control" name="women_product_image" id="floatingimage" placeholder="Image">
                            <label for="floatingimage">Image</label>
                            <div>
                                <img src="uplods/<?php echo $fetch['w_image'] ?>" alt="">
                            </div>
                        </div>
                        <fieldset class="row mx-sm-0 mx-lg-5 mb-2">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10 d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="1" checked>
                                    <label class="form-check-label" for="gridRadios3">Enable</label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios4" value="0">
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