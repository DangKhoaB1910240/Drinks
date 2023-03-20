<?php include('config.php') ?>
<?php 
    $sql = "DELETE FROM donhang where id = ".$_SESSION['iddh'];
    mysqli_query($conn,$sql);
    $sql = "DELETE from cart where iddonhang = ".$_SESSION['iddh'];
    mysqli_query($conn,$sql);
    unset($_SESSION['iddh']);
    header('location: drinks.php');
?>