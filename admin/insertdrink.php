<?php include('header.php') ;
    if(isset($_POST['save'])){
        $tieude = $mota =$active=$noibat=$gia='';
        $errors = array();
        if(isset($_POST['tieude'])){
            $tieude = $_POST['tieude'];
        }
        if(isset($_POST['mota'])){
            $mota = $_POST['mota'];
        }
        if(isset($_POST['gia'])){
            $gia = $_POST['gia'];
        }
        //Hình ảnh
        
        if(isset($_FILES['hinhanh']['name'])){
            $tenhinhanh = $_FILES['hinhanh']['name'];
            
            $duoimorong = end(explode('.',$tenhinhanh));
            $tenhinhanh = "Drink".rand(000,999).'.'.$duoimorong;
            
            $diachinguon = $_FILES['hinhanh']['tmp_name'];
            $diachidich = "../images/drink/".$tenhinhanh;
            //Tải hình ảnh lên
            $upload = move_uploaded_file($diachinguon,$diachidich);
            if($upload == false){
                $errors['hinhanh']="<div class='text-danger'><b>Chưa tải hình ảnh được!</b></div>";
            }
            
        }
        //Hình ảnh
        if(isset($_POST['noibat'])){
            $noibat = $_POST['noibat'];
        }
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }
        
        //fix lỗi Injection
        $tieude = str_replace('\'','\\\'',$tieude);
        $mota = str_replace('\'','\\\'',$mota);
        

        if($tieude == ''){
            $errors['tieude'] ="<div class='text-danger'><b>Bạn chưa nhập tiêu đề!</b></div>";
        }
        if($mota == ''){
            $errors['mota'] ="<div class='text-danger'><b>Bạn chưa nhập mô tả!</b></div>";
        }
        if($gia<=0 || $gia%1000!=0){
            $errors['gia']="<div class='text-danger'><b>Vui lòng nhập giá lớn hơn 0 và chia hết cho 1000</b></div>";
        }
        if($gia == ''){
            $errors['gia'] ="<div class='text-danger'><b>Bạn chưa nhập giá!</b></div>";
        }
        if($noibat == ''){
            $errors['noibat'] ="<div class='text-danger'><b>Bạn chưa chọn thức uống nổi bật!</b></div>";
        }
        if($active == ''){
            $errors['active'] ="<div class='text-danger'><b>Bạn chưa chọn trạng thái thức uống!</b></div>";
        }
        echo $tieude." ".$mota." ".$gia." ".$noibat." ".$active." ".$tenhinhanh;

        if(!$errors){
            $sql = "INSERT into thucuong(tieude,mota,gia,hinhanh,noibat,active) values('$tieude','$mota','$gia','$tenhinhanh','$noibat','$active')";
            $res = mysqli_query($conn,$sql);
            if($res == true){
                $message = "Bạn đã thêm thức uống thành công!";
                echo "<script>alert('$message'); location.href = 'http://localhost/drink-order/admin/showdrink.php';</script>";
            }
        }else{
            $_SESSION['themthucuong'] = "<div class='text-danger mb-3 text-center'><b>Thêm thức uống thất bại</b></div>";
        }

    }
?>
<br><br><br>
<div class="container">
<a href="showdrink.php" class="btn add_admin">< Quay lại</a>
    <h2 class="text-center mt-4 mb-4" style="background-color:#FFEFD5;">Thêm thức uống</h2>
    <?php 
        if(isset($_SESSION['themthucuong'])){
            echo $_SESSION['themthucuong'];
            unset($_SESSION['themthucuong']);
        }
    ?>
    <form  method="POST" enctype="multipart/form-data">
            <div class="row mt-4 mb-5">
                <label for="tieude" class="form-label col-sm-2 text-end "><strong>Nhập tiêu đề</strong></label>
                <div class="col-sm-9">
                    <input type="tieude" class="form-control" id="tieude" placeholder="Tiêu đề thức uống" name="tieude" value="<?php if(isset($tieude)){echo $tieude;} ?>">
                    <?php 
                    if(isset($errors['tieude'])){
                        echo $errors['tieude'];
                    }
                ?>
                </div>
                
            </div>
            <div class="row mb-5">
                <label for="mota" class="form-label col-sm-2 text-end "><strong>Nhập mô tả</strong></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="mota" placeholder="Mô tả thức uống" name="mota" value="<?php if(isset($mota)){echo $mota;} ?>">
                    <?php 
                    if(isset($errors['mota'])){
                        echo $errors['mota'];
                    }
                ?>
                </div>
            </div>
            <div class="row mb-5">
                <label for="gia" class="form-label col-sm-2 text-end "><strong>Nhập giá</strong></label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="gia" placeholder="Gía thức uống" name="gia" value="<?php if(isset($gia)){echo $gia;} ?>">
                    <?php 
                    if(isset($errors['gia'])){
                        echo $errors['gia'];
                    }
                ?>
                </div>
            </div>
            <div class="row mb-5">
                <label for="hinhanh" class="form-label col-sm-2 text-end "><strong>Chọn hình ảnh</strong></label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh">
                    <?php 
                    if(isset($errors['hinhanh'])){
                        echo $errors['hinhanh'];
                    }
                    
                ?>
                </div>
            </div>
            <div class="row mb-5">
                <label for="noibat" class="form-label col-sm-2 text-end "><strong>Sản phẩm nổi bật</strong></label>
                <div class="col-sm-9">
                    <span><input type="radio" name="noibat" value="Có" <?php if(isset($noibat) && $noibat == 'Có'){echo "checked='checked'";}?>>Có</span>
                    <span class="mx-3"><input type="radio" name="noibat" value="Không" <?php if(isset($noibat) && $noibat == 'Không'){echo "checked='checked'";}?>>Không</span>
                    <?php 
                        if(isset($errors['noibat'])){
                            echo $errors['noibat'];
                        }
                    ?>
                </div>
            </div>
            <div class="row mb-5">
                <label for="active" class="form-label col-sm-2 text-end "><strong>Trạng thái sản phẩm</strong></label>
                <div class="col-sm-9">
                    <span><input type="radio" name="active" value="Còn hàng" <?php if(isset($active) && $active == 'Còn hàng'){echo "checked='checked'";}?>>Còn hàng</span>
                    <span class="mx-3"><input type="radio" name="active" value="Hết hàng" <?php if(isset($active) && $active == 'Hết hàng'){echo "checked='checked'";}?>>Hết hàng</span>
                    <?php 
                        if(isset($errors['active'])){
                            echo $errors['active'];
                        }
                    ?>
                </div>
            </div>
            <button class="btn btn-success offset-sm-2" name="save">Lưu lại</button>
    </form>
    
</div>

<?php include('footer.php') ?>