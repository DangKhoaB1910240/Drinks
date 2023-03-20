<?php 
    include('config.php');
    
    if(isset($_GET['i'])){
        if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) >0){
            array_splice($_SESSION['giohang'],$_GET['i'],1);
        }
    }else{
        if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
    }
    if(isset($_SESSION['giohang']) && $_SESSION['giohang'] > 0){
        header('location: addcart.php');
    }else{
        header('location: drinks.php');
    }


?>