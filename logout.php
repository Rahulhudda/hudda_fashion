<?php
include_once "support.php";
include_once "destory.php";
include_once "connection.php";
session_destroy();
header("location:index.php");
?>