<?php
    include('isadmin.php') ;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'SELECT id from admin';
        $res = mysqli_query($conn, $sql);
        $kq = 0;
        while ($rows = mysqli_fetch_assoc($res)) {
            if($id == $rows['id']) {
                $kq = 1;
            }
        }
        if($kq == 0) {
            header('location: showadmin.php');
            die();
        }
        $sql = "DELETE FROM admin where id =$id";
        mysqli_query($conn,$sql);
        $_SESSION['deleteadmin'] = "<div class='text-success mb-3'><b>Xóa admin thành công</b></div>";
        header('location: showadmin.php');
    }
    else {
        header('location: showadmin.php');
            die();
    }
