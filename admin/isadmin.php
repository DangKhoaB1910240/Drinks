<?php
    include('header.php') ;
    $email = $_SESSION['email_dangnhapadmin'];
    $sql = "SELECT * FROM admin where email = '$email'";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        while($rows = mysqli_fetch_assoc($res)){
            if($rows['isAdmin'] == 0){
                header('location: showdrink.php');
            }
        }
    }
?>