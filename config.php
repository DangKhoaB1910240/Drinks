<?php
    session_start();
    $conn = mysqli_connect('localhost:3308','root','','nuocuong');
    $charset =  mysqli_set_charset($conn, "UTF8");
?>