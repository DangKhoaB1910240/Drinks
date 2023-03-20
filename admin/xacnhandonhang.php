<?php include('issell.php') ;?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "UPDATE donhang set xacnhan=1 where id = $id ";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            header('location: showdonhang.php');
        }
    }else{
        if(isset($_GET['idhuy'])){
            $id = $_GET['idhuy'];
            $sql = "UPDATE donhang set xacnhan=0 where id = $id ";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                header('location: showdonhang.php');
            }
        }else{
            header('location: showdonhang.php');
        }
    }
?>
    


<?php include('footer.php') ?>