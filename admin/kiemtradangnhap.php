<?php 
    if(!isset($_SESSION['email_dangnhapadmin'])){
        $_SESSION['kiemtradangnhap'] = "<div class='text-danger'><b>Admin đăng nhập trước khi vào hệ thống!</b></div>";
        header('location: ../dangnhap.php');
    }
?>
