<?php 
include('../config.php');
include ('kiemtradangnhap.php');

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- Link our CSS file -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navbar Section Starts -->
    <header>
        <section class="my-navbar">
            <div class="container">
                <div class="logo">
                    <img src="../images/logo_01.png" alt="Drink Logo" class="img-responsive">
                </div>

                <div class="menu text-right">
                    <ul>
                        <?php 
                            $email = $_SESSION['email_dangnhapadmin'];
                            $sql = "SELECT * FROM admin where email = '$email'";
                            $res = mysqli_query($conn,$sql);
                            if($res==true){
                                while($rows = mysqli_fetch_assoc($res)){
                                    if($rows['isAdmin'] == 1){
                                        echo '<li>
                                        <a href="showadmin.php">QUẢN LÍ ADMIN</a>
                                    </li>';
                                    }
                                    if($rows['isSell'] == 1){
                                        echo '<li>
                                        <a href="showdonhang.php">QUẢN LÍ ĐƠN HÀNG</a>
                                    </li>';
                                    }
                                }
                            }
                        ?>
                        
                        <li>
                            <a href="showdrink.php">QUẢN LÍ NƯỚC UỐNG</a>
                        </li>
                        
                        <li>
                            <a href="dangxuat.php">ĐĂNG XUẤT</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix">

                </div>
            </div>
        </section>
    </header>
    <!-- Navbar Section Ends -->