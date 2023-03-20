<?php
    include('../config.php');
    if(isset($_GET['id']) ){
        $id = $_GET['id'];
        $sql = 'SELECT id from thucuong';
        $res = mysqli_query($conn, $sql);
        $kq = 0;
        while ($rows = mysqli_fetch_assoc($res)) {
            if($id == $rows['id']) {
                $kq = 1;
            }
        }
        if($kq == 0) {
            header('location: showdrink.php');
            die();
        }
        $sql = "DELETE FROM thucuong where id =$id";
        mysqli_query($conn,$sql);
        $_SESSION['deletedrink'] = "<div class='text-success mb-3'><b>Xóa thức uống thành công</b></div>";
        header('location: showdrink.php');
    }else{
        header('location: showdrink.php');
            die();
    }
?>