<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";

// p($_POST);
if (isset($_POST['save'])) {

    $img = $_FILES['men_product_image'];
    $file_name = time() . rand() . $img['name'];
    $tname = $img['tmp_name'];
    $path = "upload/" . $file_name;
    move_uploaded_file($tname, $path);
    // P($_FILES);

    $men_name = $_POST['men_product_name'];
    $men_price = $_POST['men_product_price'];
    $men_rating = $_POST['men_product_rating'];
    $men_invoice = $_POST['men_product_invoice'];
    $men_status = $_POST['status'];

    $men_ins = "INSERT INTO man_detail SET
    
    m_name = '$men_name',
    m_price ='$men_price',
    m_rating ='$men_rating',
    m_invoice ='$men_invoice',
    m_image = '$file_name', 
    m_status ='$men_status'
    ";
    $men_exe = mysqli_query($conn, $men_ins);
    // if($men_exe){
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
        <h5>Men add page</h5>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-ligh rounded h-100 p-4">

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <input type="text" class="form-control" name="men_product_name" id="floatiname" placeholder="men_product">
                            <label for="floatiname">Product_Name</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="text" class="form-control" name="men_product_invoice" id="floatingInput" placeholder="Invoice_number">
                            <label for="floatingInput">Invoice Number</label>

                        </div>
                    </div>

                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form  mb-2">
                            <input type="text" class="form-control" name="men_product_price" id="floatingInput" placeholder="price">
                            <label for="floatingInput">Product_price</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="text" class="form-control" name="men_product_rating" id="floatingInput" placeholder="rating">
                            <label for="floatingInput">Product_rating</label>
                        </div>

                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-3">
                            <input type="file" class="form-control" name="men_product_image" id="floatingimage" placeholder="Image">
                            <label for="floatingimage">Image</label>
                            <div>
                                <img src="uplods/<?php echo $fetch['m_image'] ?>" alt="">
                            </div>

                        </div>
                        <fieldset class="row mx-sm-0 mx-lg-5 mb-2">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10 d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="1">
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