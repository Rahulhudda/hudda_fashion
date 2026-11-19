<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";

// add insert query 
// p($_POST);

if (isset($_POST['save'])) {
    $img = $_FILES['user_image'];
    $file_name = time() .rand() . $img['name'];
    $tname = $img['tmp_name'];
    $path = "upload/" . $file_name;
    move_uploaded_file($tname, $path);
    // p($_FILES);

    $gender   = $_POST['gender'];
    $name     = $_POST['user_name'];
    $email    = $_POST['user_email'];
    $mobile   = $_POST['user_mobile'];
    $password = $_POST['user_password'];
    $country  = $_POST['user_country'];
    $state    = $_POST['user_state'];
    $city     = $_POST['user_city'];
    $adderss  = $_POST['user_address'];
    $status    = $_POST['User_status'];

    $user_ins = "INSERT INTO user_detail SET
    u_gender  ='$gender',
    u_name    ='$name',
    u_email   ='$email',
    u_mobile  ='$mobile',
    u_image = '$file_name', 
    country   ='$country',
    states    ='$state',
    city      =' $city ',
    u_password='$password',
    u_address ='$adderss',
    u_status  ='$status'
    ";

    $user_exe = mysqli_query($conn, $user_ins);
    // if ($user_exe) {
    //     echo "Data Insterd";
    // } else {
    //     echo 'Data is not Insterd' . mysqli_error($conn);
    // }
}


include_once "admin_header.php";
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-ligh rounded h-100 p-4">
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10 d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked>
                                <label class="form-check-label" for="gridRadios1">Male</label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
                                <label class="form-check-label" for="gridRadios2">Female</label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="Other">
                                <label class="form-check-label" for="gridRadios3">Other</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <input type="text" class="form-control" name="user_name" id="floatiname" placeholder="name">
                            <label for="floatiname">Name</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="email" class="form-control" name="user_email" id="floatingInput" placeholder="Email address">
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form  mb-2">
                            <input type="number" class="form-control" name="user_mobile" id="floatimobile" placeholder="Mobile">
                            <label for="floatimobile">Mobile No</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="password" class="form-control" name="user_password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <select class="form-select py-0" name="user_country" id="floatingSelect" aria-label="Floating label select example">
                                <option value="">Select Country</option>
                                <option value="Afghanistan"> Afghanistan</option>
                                <option value="Albania"> Albania</option>
                                <option value="Algeria"> Algeria</option>
                                <option value="American Samoa"> American Samoa</option>
                                <option value="Andorra"> Andorra</option>
                                <option value="Angola"> Angola</option>
                                <option value="Anguilla"> Anguilla</option>
                                <option value="Antigua"> Antigua</option>
                                <option value="Argentina"> Argentina</option>
                                <option value="Armenia"> Armenia</option>
                                <option value="Aruba"> Aruba</option>
                                <option value="Australia"> Australia</option>
                                <option value="Austria"> Austria</option>
                                <option value="Azerbaijan"> Azerbaijan</option>
                                <option value="Bahamas"> Bahamas</option>
                                <option value="Bahrain"> Bahrain</option>
                                <option value="Bangladesh"> Bangladesh</option>
                                <option value="Barbados"> Barbados</option>
                                <option value="Belarus"> Belarus</option>
                                <option value="Belgium"> Belgium</option>
                                <option value="Belize"> Belize</option>
                                <option value="Benin"> Benin</option>
                                <option value="Bermuda"> Bermuda</option>
                                <option value="Bhutan"> Bhutan</option>
                                <option value="Bolivia"> Bolivia</option>
                                <option value="Bonaire"> Bonaire</option>
                                <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina</option>
                                <option value="Botswana"> Botswana</option>
                                <option value="Brazil"> Brazil</option>
                                <option value="Brunei"> Brunei</option>
                                <option value="Bulgaria"> Bulgaria</option>
                                <option value="Burkina"> Burkina Faso</option>
                                <option value="Burundi"> Burundi</option>
                                <option value="Cambodia"> Cambodia</option>
                                <option value="Cameroon"> Cameroon</option>
                                <option value="Canada"> Canada</option>
                                <option value="Canary Islands"> Canary Islands</option>
                                <option value="Cape Verde"> Cape Verde</option>
                                <option value="Cayman Islands"> Cayman Islands</option>
                                <option value="Central African Republic"> Central African Republic</option>
                                <option value="Chad"> Chad</option>
                                <option value="Chile"> Chile</option>
                                <option value="China"> China</option>
                                <option value="Colombia"> Colombia</option>
                                <option value="Comoros"> Comoros</option>
                                <option value="Congo"> Congo</option>
                                <option value="Cook Islands"> Cook Islands</option>
                                <option value="Costa Rica"> Costa Rica</option>
                                <option value="Cote d&#039;Ivoire"> Cote d&#039;Ivoire</option>
                                <option value="Croatia"> Croatia</option>
                                <option value="Cuba"> Cuba</option>
                                <option value="Curacao"> Curacao</option>
                                <option value="Cyprus"> Cyprus</option>
                                <option value=" Czech Republic"> Czech Republic</option>
                                <option value="Denmark"> Denmark</option>
                                <option value="Djibouti"> Djibouti</option>
                                <option value="Dominican Republic"> Dominican Republic</option>
                                <option value="East Timor"> East Timor</option>
                                <option value="Ecuador"> Ecuador</option>
                                <option value="Egypt"> Egypt</option>
                                <option value="El Salvador"> El Salvador</option>
                                <option value="Eritrea"> Eritrea</option>
                                <option value="Estonia"> Estonia</option>
                                <option value="Ethiopia"> Ethiopia</option>
                                <option value="Falkland Islands"> Falkland Islands</option>
                                <option value="Faroe Islands"> Faroe Islands</option>
                                <option value="Fiji"> Fiji</option>
                                <option value="Finland"> Finland</option>
                                <option value="318"> France</option>
                                <option value="French Guyana"> French Guyana</option>
                                <option value="Gabon"> Gabon</option>
                                <option value="Gambia"> Gambia</option>
                                <option value="Georgia"> Georgia</option>
                                <option value="Germany"> Germany</option>
                                <option value="Ghana"> Ghana</option>
                                <option value="Gibraltar"> Gibraltar</option>
                                <option value="Greece"> Greece</option>
                                <option value="Greenland"> Greenland</option>
                                <option value="Grenada"> Grenada</option>
                                <option value="Guadeloupe"> Guadeloupe</option>
                                <option value="Guam"> Guam</option>
                                <option value="Guatemala"> Guatemala</option>
                                <option value="Guernsey"> Guernsey</option>
                                <option value="Guinea"> Guinea</option>
                                <option value="Guyana"> Guyana</option>
                                <option value="Haiti"> Haiti</option>
                                <option value="Honduras"> Honduras</option>
                                <option value="Hong Kong"> Hong Kong</option>
                                <option value="Hungary"> Hungary</option>
                                <option value="Iceland"> Iceland</option>
                                <option value="India"> India</option>
                                <option value="Indonesia"> Indonesia</option>
                                <option value="Iran"> Iran</option>
                                <option value="Iraq"> Iraq</option>
                                <option value="Ireland"> Ireland</option>
                                <option value="Israel"> Israel</option>
                                <option value="Italy"> Italy</option>
                                <option value="Jamaica"> Jamaica</option>
                                <option value="Japan"> Japan</option>
                                <option value="Jersey"> Jersey</option>
                                <option value="Jordan"> Jordan</option>
                                <option value="Kazakhstan"> Kazakhstan</option>
                                <option value="Kenya"> Kenya</option>
                                <option value="Kiribati"> Kiribati</option>
                                <option value="Korea, Republic Of"> Korea, Republic Of</option>
                                <option value="Korea, The D.P.R of"> Korea, The D.P.R of</option>
                                <option value="Kosovo"> Kosovo</option>
                                <option value="Kuwait"> Kuwait</option>
                                <option value="Kyrgyzstan"> Kyrgyzstan</option>
                                <option value="Lao"> Lao</option>
                                <option value="Latvia"> Latvia</option>
                                <option value="Lebanon"> Lebanon</option>
                                <option value="Lesotho"> Lesotho</option>
                                <option value="Liberia"> Liberia</option>
                                <option value="Libya"> Libya</option>
                                <option value="Liechtenstein"> Liechtenstein</option>
                                <option value="Lithuania"> Lithuania</option>
                                <option value="Luxembourg"> Luxembourg</option>
                                <option value="Macau"> Macau</option>
                                <option value="Macedonia"> Macedonia</option>
                                <option value="Madagascar"> Madagascar</option>
                                <option value="Malawi"> Malawi</option>
                                <option value="Malaysia"> Malaysia</option>
                                <option value="Maldives"> Maldives</option>
                                <option value="Mali"> Mali</option>
                                <option value="Malta"> Malta</option>
                                <option value="Marshall Islands"> Marshall Islands</option>
                                <option value="Martinique"> Martinique</option>
                                <option value="Mauritania"> Mauritania</option>
                                <option value="Mauritius"> Mauritius</option>
                                <option value="Mayotte"> Mayotte</option>
                                <option value="Mexico"> Mexico</option>
                                <option value="Micronesia, Federated States of"> Micronesia, Federated States of</option>
                                <option value="Moldova"> Moldova</option>
                                <option value="Monaco"> Monaco</option>
                                <option value="Mongolia"> Mongolia</option>
                                <option value="Montenegro"> Montenegro</option>
                                <option value="Montserrat"> Montserrat</option>
                                <option value="Morocco"> Morocco</option>
                                <option value="Mozambique"> Mozambique</option>
                                <option value="Myanmar"> Myanmar</option>
                                <option value="Namibia"> Namibia</option>
                                <option value="Nauru"> Nauru</option>
                                <option value="Nepal"> Nepal</option>
                                <option value="Netherlands Antilles"> Netherlands Antilles</option>
                                <option value="Netherlands, The"> Netherlands, The</option>
                                <option value="Nevis"> Nevis</option>
                                <option value="New Caledonia"> New Caledonia</option>
                                <option value="New Zealand"> New Zealand</option>
                                <option value="Nicaragua"> Nicaragua</option>
                                <option value="Niger"> Niger</option>
                                <option value="Nigeria"> Nigeria</option>
                                <option value="Niue"> Niue</option>
                                <option value="Norway"> Norway</option>
                                <option value="Oman"> Oman</option>
                                <option value="Pakistan"> Pakistan</option>
                                <option value="Palau"> Palau</option>
                                <option value="Panama"> Panama</option>
                                <option value="Papua New Guinea"> Papua New Guinea</option>
                                <option value="Paraguay"> Paraguay</option>
                                <option value="Peru"> Peru</option>
                                <option value="Philippines"> Philippines</option>
                                <option value="Poland"> Poland</option>
                                <option value="Portugal"> Portugal</option>
                                <option value=" Puerto Rico"> Puerto Rico</option>
                                <option value="Qatar"> Qatar</option>
                                <option value="Reunion"> Reunion</option>
                                <option value="Romania"> Romania</option>
                                <option value="Russia"> Russia</option>
                                <option value="Rwanda"> Rwanda</option>
                                <option value="Saint Helena"> Saint Helena</option>
                                <option value="Saipan"> Saipan</option>
                                <option value="Samoa"> Samoa</option>
                                <option value="San Marino"> San Marino</option>
                                <option value="Sao Tome and Principe"> Sao Tome and Principe</option>
                                <option value="Saudi Arabia"> Saudi Arabia</option>
                                <option value="Senegal"> Senegal</option>
                                <option value="Serbia"> Serbia</option>
                                <option value="Seychelles"> Seychelles</option>
                                <option value="Sierra Leone"> Sierra Leone</option>
                                <option value="Singapore"> Singapore</option>
                                <option value="Slovakia"> Slovakia</option>
                                <option value="Slovenia"> Slovenia</option>
                                <option value="Solomon Islands"> Solomon Islands</option>
                                <option value="Somalia"> Somalia</option>
                                <option value="Somaliland, Rep of (North Somalia)"> Somaliland, Rep of (North Somalia)</option>
                                <option value="South Africa<"> South Africa</option>
                                <option value="South Sudan"> South Sudan</option>
                                <option value="Spain"> Spain</option>
                                <option value="Sri Lanka"> Sri Lanka</option>
                                <option value="St. Barthelemy"> St. Barthelemy</option>
                                <option value="St. Eustatius"> St. Eustatius</option>
                                <option value="St. Kitts"> St. Kitts</option>
                                <option value="St. Lucia"> St. Lucia</option>
                                <option value="St. Maarten"> St. Maarten</option>
                                <option value="St. Vincent"> St. Vincent</option>
                                <option value="Sudan"> Sudan</option>
                                <option value="Suriname"> Suriname</option>
                                <option value="Swaziland"> Swaziland</option>
                                <option value="Sweden"> Sweden</option>
                                <option value="Switzerland"> Switzerland</option>
                                <option value="Syria"> Syria</option>
                                <option value="Tahiti"> Tahiti</option>
                                <option value="Taiwan"> Taiwan</option>
                                <option value="Tajikistan"> Tajikistan</option>
                                <option value="Tanzania"> Tanzania</option>
                                <option value="Thailand"> Thailand</option>
                                <option value="Togo"> Togo</option>
                                <option value="Tonga"> Tonga</option>
                                <option value="Trinidad and Tobago"> Trinidad and Tobago</option>
                                <option value="Tunisia"> Tunisia</option>
                                <option value="Turkey"> Turkey</option>
                                <option value="Turks and Caicos Islands"> Turks and Caicos Islands</option>
                                <option value="Tuvalu"> Tuvalu</option>
                                <option value="Uganda"> Uganda</option>
                                <option value="Ukraine"> Ukraine</option>
                                <option value="United Arab Emirates"> United Arab Emirates</option>
                                <option value="United Kingdom"> United Kingdom</option>
                                <option value="United States Of America"> United States Of America</option>
                                <option value="Uruguay"> Uruguay</option>
                                <option value="Uzbekistan"> Uzbekistan</option>
                                <option value="Vanuatu"> Vanuatu</option>
                                <option value="Venezuela"> Venezuela</option>
                                <option value="Vietnam"> Vietnam</option>
                                <option value="Virgin Islands (British)"> Virgin Islands (British)</option>
                                <option value="Virgin Islands (US)"> Virgin Islands (US)</option>
                                <option value="Yemen"> Yemen</option>
                                <option value="Zambia"> Zambia</option>
                                <option value="Zimbabwe"> Zimbabwe</option>
                            </select>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-2">
                            <input type="text" class="form-control" name="user_state" id="floatistate" placeholder="State">
                            <label for="floatingstate">State</label>
                        </div>
                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-2">
                            <input type="text" class="form-control" name="user_city" id="floaticity" placeholder="City">
                            <label for="floatingcity">City</label>
                        </div>
                        <div class="form-floating main_form mx-sm-0 mx-lg-5 mb-3">
                            <textarea class="form-control" placeholder="Address" name="user_address" id="floatingTextarea" style="height:50px;"></textarea>
                            <label for="floatingTextarea">Address</label>
                        </div>
                    </div>
                    <div class="d-flex  flex-sm-row flex-column">
                        <div class="form-floating main_form mb-3">
                            <input type="file" class="form-control" name="user_image" value="<?php echo $fetch['u_image'] ?>" id="floatingimage" placeholder="Image">
                            <label for="floatingimage">Image</label>
                            <div>
                                <img src="uplods/<?php echo $fetch['u_image'] ?>" alt="">
                            </div>
                        </div>
                        <fieldset class="row mx-sm-0 mx-lg-5 mb-2">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10 d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="User_status" id="gridRadios3" value="1" checked>
                                    <label class="form-check-label" for="gridRadios3">active</label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" name="User_status" id="gridRadios4" value="0">
                                    <label class="form-check-label" for="gridRadios4">Decative</label>
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