
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
                    <input type="number" class="mx-2  form-control" name="sodienthoai">
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





