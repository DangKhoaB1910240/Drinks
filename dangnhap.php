<?php 
    include('config.php');
    if(isset($_POST['dangky'])){
        $hoten = $email = $matkhau ='';
        if(isset($_POST['hoten']) ){
            $hoten = $_POST['hoten'];
        }
        if(isset($_POST['email']) ){
            $email = $_POST['email'];
        }
        if(isset($_POST['matkhau']) ){
            $matkhau = $_POST['matkhau'];
        }
        // fix lỗi SQL Injection
        $hoten = str_replace('\'','\\\'',$hoten);
        $email = str_replace('\'','\\\'',$email);
        $matkhau = str_replace('\'','\\\'',$matkhau);
        
        $errors = array();
        if($hoten == ''){
            $errors['hoten']="<div class='text-danger'><b>Chưa nhập họ tên</b></div>";
        }
        if($email == ''){
            $errors['email']="<div class='text-danger'><b>Chưa nhập email</b></div>";
        }
        if($matkhau == ''){
            $errors['matkhau']="<div class='text-danger'><b>Chưa nhập mật khẩu</b></div>";
        }
        $sql2 = "SELECT * from khachhang where email='$email'";
        $kq2 = mysqli_query($conn,$sql2);
        $count = mysqli_num_rows($kq2);
        if($count == 1){
            $errors['email'] = "<div class='text-danger'><b>Email đã tồn tại. Nhập email khác !</b></div>";
        }
        $matkhau = md5($matkhau);
        if(!$errors){
            $sql = "INSERT into khachhang(hoten,email,matkhau) values('$hoten','$email','$matkhau')";
            $kq = mysqli_query($conn,$sql);
            if($kq==true){
                $_SESSION['dangky'] = "<div class='text-success'><b>Đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ!</b></div>";
            }
        }else{
            $_SESSION['dangky'] = "<div class='text-danger'><b>Đăng ký thất bại. Vui lòng kéo qua để xem chi tiết!</b></div>";
            
        }
    }
    if(isset($_POST['dangnhap'])){
        if(isset($_POST['admin'])){
            $email_dangnhap = $_POST['email2'];
            $matkhau_dangnhap = $_POST['matkhau2'];
            $errors = array();
            if($email_dangnhap == ''){
                $errors['email2']="<div class='text-danger'><b>Bạn chưa nhập email của admin!</b></div>";
            }
            if($matkhau_dangnhap == ''){
                $errors['matkhau2']="<div class='text-danger'><b>Bạn chưa nhập mật khẩu của admin!</b></div>";
            }
            $matkhau_dangnhap = md5($matkhau_dangnhap);
            $matkhau_dangnhap = $matkhau_dangnhap;
            if(!$errors){
                $sql = "SELECT * from admin where email='$email_dangnhap' and matkhau='$matkhau_dangnhap'";
                $kq = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($kq);
                if($count == 1){
                    $_SESSION['dangnhap'] = "<div class='text-success'><b>Đăng nhập thành công</b></div>";
                    $_SESSION['email_dangnhapadmin']=$email_dangnhap;
                   
                    header("location: admin/showadmin.php");
                }
                else{
                    $_SESSION['dangnhap'] = "<div class='text-danger'><b>Tài khoản và mật khẩu không tồn tại<br><span class='offset-sm-4'>Đăng nhập lại!</span></b></div>";
                }
            }else{
                $_SESSION['dangnhap'] = "<div class='text-danger'><b>Đăng nhập thất bại</b></div>";
            }
        }
        else{
            $email_dangnhap = $_POST['email2'];
            $matkhau_dangnhap = $_POST['matkhau2'];
            $errors = array();
            if($email_dangnhap == ''){
                $errors['email2']="<div class='text-danger'><b>Bạn chưa nhập email !</b></div>";
            }
            if($matkhau_dangnhap == ''){
                $errors['matkhau2']="<div class='text-danger'><b>Bạn chưa nhập mật khẩu !</b></div>";
            }
            $matkhau_dangnhap = md5($matkhau_dangnhap);
            if(!$errors){
                $sql = "SELECT * from khachhang where email='$email_dangnhap' and matkhau='$matkhau_dangnhap'";
                $kq = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($kq);
                if($count == 1){
                    $_SESSION['dangnhap'] = "<div class='text-success'><b>Đăng nhập thành công</b></div>";
                    $_SESSION['email_dangnhap'] = $email_dangnhap;
                    header("location: index.php");
                }
                else{
                    $_SESSION['dangnhap'] = "<div class='text-danger'><b>Tài khoản và mật khẩu không tồn tại<br><span class='offset-sm-4'>Đăng nhập lại!</span></b></div>";
                }
            }else{
                $_SESSION['dangnhap'] = "<div class='text-danger'><b>Đăng nhập thất bại</b></div>";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <!-- font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>

<body class="body_sign">
    <?php 
        if(isset($_SESSION['dangky'])){
            echo $_SESSION['dangky'];
            unset($_SESSION['dangky']);
        }
        if(isset($_SESSION['dangnhap'])){
            echo $_SESSION['dangnhap'];
            unset($_SESSION['dangnhap']);
        }
        if(isset($_SESSION['kiemtradangnhap'])){
            echo $_SESSION['kiemtradangnhap'];
            unset($_SESSION['kiemtradangnhap']);
        }
    ?>
    <main>
        <section>
            <div class="container" id="container">
                <div class="form-container sign-up-container">
                    <form method="POST" action="">
                        <h1>Đăng ký</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                        <input type="text" placeholder="Họ và tên" name="hoten"/>
                        <?php 
                            if(isset($errors['hoten'])){
                                echo $errors['hoten'];
                            }
                        ?>
                        <input type="email" placeholder="Email" name="email"/>
                        <?php 
                            if(isset($errors['email'])){
                                echo $errors['email'];
                            }
                        ?>
                        <input type="password" placeholder="Mật khẩu" name="matkhau"/>
                        <?php 
                            if(isset($errors['matkhau'])){
                                echo $errors['matkhau'];
                            }
                        ?>
                        <button name="dangky" type="submit">Đăng ký</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form method="POST" action="">
                        <h1>Đăng nhập</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                        <input type="email" placeholder="Email" name="email2" />
                        <?php 
                            if(isset($errors['email2'])){
                                echo $errors['email2'];
                            }
                        ?>
                        <input type="password" placeholder="Mật khẩu" name="matkhau2" />
                        <?php 
                            if(isset($errors['matkhau2'])){
                                echo $errors['matkhau2'];
                            }
                        ?>
                        <input type="checkbox" name="admin"><p style="font-family: 'Nunito', sans-serif;"> Đăng nhập với tư cách Admin</p>
                        
                        <button type="submit" name="dangnhap">Đăng nhập</button>
                    </form>
                
                </div>
                
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Xin chào</h1>
                            <p>Hãy kết nối ngay với RingRing thôi nào!</p>
                            <button class="ghost" id="signIn">Đăng nhập</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Chào bạn!</h1>
                            <p>Bắt đầu khám phá hương vị tươi mát cùng RingRing tại đây</p>
                            <button class="ghost" id="signUp">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/login.js"></script>
</body>
<!-- <script src="js.js"></script> -->

</html>