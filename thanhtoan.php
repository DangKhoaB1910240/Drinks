
<?php include('header.php') ?>
<?php 
    if(!isset($_SESSION['giohang']) || $_SESSION['giohang'] == []){
        header('location: drinks.php');
    }
    if(!isset($_SESSION['email_dangnhap'])){
        header('location: dangnhap.php');
    }
    $sum = 0;
    foreach ($_SESSION['giohang'] as $item) {
        $tt = (int)$item[3]*(int)$item[5];
        $sum+=$tt;
    }
    $iduser = 0;
    $email = $_SESSION['email_dangnhap'];
    $sql = "SELECT id FROM khachhang where email ='$email'";
    $res = mysqli_query($conn,$sql);
    if($res == true){
        while($row = mysqli_fetch_assoc($res)){
            $iduser=$row['id'];
        }
    } 
    //Lấy dữ liệu
    
    if(isset($_POST['submit']) && $_POST['submit']){
        $madh = "trasua".rand(0,999999);
        $hoten = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $sodienthoai = $_POST['sodienthoai'];
        $pttt = $_POST['pttt'];
        $tongtien = $_POST['tongtien'];
        //Tạo đơn hàng
        //trả về id donhang
        $sql = "INSERT INTO `donhang`(`madonhang`, `tongdonhang`, `phuongthucthanhtoan`, `iduser`, `hoten`, `email`, `diachi`, `sodienthoai`,`ngaydat`, `xacnhan`, `thanhtoan`) 
        VALUES ('$madh','$tongtien','$pttt','$iduser','$hoten','$email','$diachi','$sodienthoai',NOW(),'0','0')";
        $res = mysqli_query($conn,$sql);
        $iddh = mysqli_insert_id($conn);
        $_SESSION['iddh'] = $iddh;
        $sql = "SELECT * FROM donhang where id = $iddh";
        $res = mysqli_query($conn,$sql);
        if($res == true){
            while($rows = mysqli_fetch_assoc($res)){
                $_SESSION['tongtien'] = $rows['tongdonhang'];
            }
        }
        if(isset($_SESSION['giohang']) && $_SESSION['giohang']){
            //array($id,$tieude,$mota,$gia,$hinhanh,$soluong,$noibat,$active);
            foreach ($_SESSION['giohang'] as $item) {
                $sql = "INSERT INTO `cart`(`iddonhang`, `idthucuong`, `soluong`, `dongia`, `tensp`, `img`) 
                VALUES ('$iddh','$item[0]','$item[5]','$item[3]','$item[1]','$item[4]')";
                mysqli_query($conn,$sql);
            }
            unset($_SESSION['giohang']);
            header('location: donhang.php');
        }
    }
    

    
?>
    <main class="main_introd">
        <section class="body_intro">
        <h2>Điền thông tin nhận hàng</h2>
        <div >
            <form action="thanhtoan.php" method="POST">
                <input type="hidden" value="<?php echo $sum; ?>" name="tongtien">
                <div class="input-group mb-4" style="width:50%">
                    <label style="width:30%;font-weight:bold;" class="my-2 " for="">Nhập họ tên</label>
                    <input type="text" class="mx-2  form-control" name="hoten">
                </div>
                
                <div class="input-group mb-4" style="width:50%">
                    <label style="width:30%;font-weight:bold;" class="my-2 " for="">Nhập địa chỉ</label>
                    <input type="text" class="mx-2  form-control" name="diachi">
                </div>
                <div class="input-group mb-4" style="width:50%">
                    <label style="width:30%;font-weight:bold;" class="my-2 " for="">Nhập email</label>
                    <input type="text" class="mx-2  form-control" name="email">
                </div>

                <div class="input-group mb-4" style="width:50%">
                    <label style="width:30%;font-weight:bold;" class="my-2 " for="">Nhập số điện thoại</label>
                    <input type="text" class="mx-2  form-control" name="sodienthoai">
                </div>
                <div class="input-group mb-4" style="width:50%;display:block;">
                    <label class="my-2 " style="font-weight:bold;" for="">Chọn phương thức thanh toán</label><br>
                    <div>
                        <input type="radio" value="1" name="pttt">Thanh toán khi nhận hàng
                    </div>
                    <div>
                        <input type="radio" value="2" name="pttt">Chuyển khoản
                    </div>
                    <div>
                        <input type="radio" value="3" name="pttt">Momo
                    </div>
                    <div>
                        <input type="radio" value="4" name="pttt">Thanh toán online
                    </div>
                </div>
                <div class="input-group mb-4" style="width:30%;display:block;">
                    <input type="submit" class="btn btn-success" name="submit" value="Xác nhận">
                </div>
            </form>
        </div>
        
        

        </div>
        </section>
    </main>

    <?php include('footer.php') ?>





