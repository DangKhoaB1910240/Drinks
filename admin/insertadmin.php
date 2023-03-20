<?php include('isadmin.php') ;
    if(isset($_POST['save'])){
        $email = $matkhau ='';
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['matkhau'])){
            $matkhau = $_POST['matkhau'];
        }
        //fix lỗi Injection
        $email = str_replace('\'','\\\'',$email);
        $matkhau = str_replace('\'','\\\'',$matkhau);
        $errors = array();
        
        if($email == ''){
            $errors['email'] ="<div class='text-danger'><b>Bạn chưa nhập email của admin!</b></div>";
        }
        if($matkhau == ''){
            $errors['matkhau'] ="<div class='text-danger'><b>Bạn chưa nhập mật khẩu của admin!</b></div>";
        }
        $matkhau =md5($matkhau);
        $sql = "SELECT * FROM admin where email='$email'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count >0){
            $errors['email'] ="<div class='text-danger'><b>Email đã tồn tại! Nhập email khác</b></div>";
        }
        if(!$errors){
            $sql = "INSERT into admin(email,matkhau) values('$email','$matkhau')";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                $message = "Bạn đã thêm admin thành công!";
                echo "<script>alert('$message'); location.href = 'http://localhost/drink-order/admin/showadmin.php';</script>";
            }
        }else{
            $_SESSION['themadmin'] = "<div class='text-danger mb-3 text-center'><b>Thêm admin không thành công</b></div>";
        }

    }
?>
<br><br><br>
<div class="container show_admin">
    <a href="showadmin.php" class="btn add_admin">< Quay lại</a>
    <h2 class="text-center mt-4" style="background-color:#FFEFD5;">Thêm admin</h2>
    <?php 
        if(isset($_SESSION['themadmin'])){
            echo $_SESSION['themadmin'];
            unset($_SESSION['themadmin']);
        }
    ?>
    <form  method="POST">
            <div class="row mt-4 mb-5">
                <label for="email" class="form-label col-sm-2 text-end "><strong>Email</strong></label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" value="<?php if(isset($email)){echo $email;} ?>">
                    <?php 
                    if(isset($errors['email'])){
                        echo $errors['email'];
                    }
                ?>
                </div>
                
            </div>
            <div class="row mb-5">
                <label for="matkhau" class="form-label col-sm-2 text-end "><strong>Mật khẩu</strong></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="matkhau" placeholder="Nhập mật khẩu" name="matkhau">
                    <?php 
                    if(isset($errors['matkhau'])){
                        echo $errors['matkhau'];
                    }
                ?>
                </div>
            </div>
            
            <button class="btn offset-sm-2" name="save" style="height: 45px; background-color: #e99714; font-family: 'Nunito', sans-serif; font-weight: bold;">Lưu lại</button>
    </form>
    
</div>

<?php include('footer.php') ?>