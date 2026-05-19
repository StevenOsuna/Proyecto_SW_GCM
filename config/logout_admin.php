<?php
session_start();
include_once '../config/config.php';
session_destroy();

header("Location:" . BASE_URL . "auth/login_admin.php");
exit();
?>