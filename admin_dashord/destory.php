<?php
if( $_SESSION['ADMIN_ID'] == ''){
    header("location:login.php");
}
?>