<?php
    include_once "php-files/config.php";
    session_start();
    session_unset();
    session_destroy();
    header("Location:".$base_url."my-admin/index.php");
?>