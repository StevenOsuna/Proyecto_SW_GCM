<?php
session_start();
include_once '../config/config.php';
session_destroy();

header("Location:" . BASE_URL . "admin/admin_login.php");
exit();
?>