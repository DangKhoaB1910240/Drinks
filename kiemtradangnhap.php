<?php 
   
    if(isset($_SESSION['email_dangnhap'])){
        echo "<a href='dangxuat.php'>ĐĂNG XUẤT</a>" ;
    }else{
        echo "<a href='dangnhap.php'>ĐĂNG NHẬP</a>" ;
    }
?>
