<?php 
    include('../config.php');
    session_destroy();
    $_SESSION['kiemtradangnhap']="<div class='text-danger'><b>Admin vui lòng đăng nhập trước!</b></div> ";
    header('location: ../dangnhap.php');
?>