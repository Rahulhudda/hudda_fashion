<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "hudda_fashion");
    // echo "connection succes";
} catch (Exception $error) {
    echo $error->getMessage("");
};
?>
