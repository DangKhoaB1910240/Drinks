
<?php include('header.php') ;
    if(isset($_GET['id'])){
        $id =$_GET['id'];
        $sql ="SELECT * FROM thucuong where id=$id";
        $res = mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count==1){
            $rows = mysqli_fetch_assoc($res);
            $tieude = $rows['tieude'];
            $mota = $rows['mota'];
            $gia = $rows['gia'];
            $hinhanh = $rows['hinhanh'];
            $noibat = $rows['noibat'];
            $active = $rows['active'];
        }
    }
    if(isset($_POST['dathang'])){
        $tenkhachhang = $diachikhachhang = $emailkhachhang =$sdtkhachhang = '';
        if(isset($_POST['thucuong'])){
            $thucuong = $_POST['thucuong'];
        }
        if(isset($_POST['gia'])){
            $gia = $_POST['gia'];
        }
        if(isset($_POST['soluong'])){
            $soluong = $_POST['soluong'];
        }
        $tongcong = $soluong * $gia;
        $ngaydat = date("Y-m-d h:i:sa");
        $trangthai="Đã đặt";
        if(isset($_POST['tenkhachhang'])){
            $tenkhachhang = $_POST['tenkhachhang'];
        }
        if(isset($_POST['sdtkhachhang'])){
            $sdtkhachhang = $_POST['sdtkhachhang'];
        }
        if(isset($_POST['diachikhachhang'])){
            $diachikhachhang = $_POST['diachikhachhang'];
        }
        if(isset($_POST['emailkhachhang'])){
            $emailkhachhang = $_POST['emailkhachhang'];
        }
        //Fix lỗi Injection
        $tenkhachhang = str_replace('\'','\\\'',$tenkhachhang);
        $diachikhachhang = str_replace('\'','\\\'',$diachikhachhang);
        $emailkhachhang = str_replace('\'','\\\'',$emailkhachhang);
        $errors = array();
        if(!$errors){
            echo $sql = "INSERT INTO dathang(`thucuong`, `gia`, `soluong`, `tongcong`, `ngaydat`, `trangthai`, `tenkhachhang`, `sdtkhachhang`, `emailkhachhang`, `diachikhachhang`) VALUES ('$thucuong','$gia','$soluong','$tongcong','$ngaydat','$trangthai','$tenkhachhang','$sdtkhachhang','$emailkhachhang','$diachikhachhang')";
            $res = mysqli_query($conn,$sql);
            if($res==true){
                $message = "Đặt hàng thành công! Xin cám ơn quý khách đã tin dùng thức uống tại RingRing.";
                echo "<script>alert('$message'); location.href = 'http://localhost/drink-order/';</script>";
            }
        }
    }
    
?>

    <main>
        <!-- Drink Search Section Starts -->
        <section class="drink-search text-center" style=" background-color: #e99714;">
            <div class="container">
                <h2 class="text-center">Điền thông tin chi tiết đặt hàng vào bên dưới</h2>

                <form class="order" method="POST">
                    <fieldset>
                        <legend>Thức uống</legend>

                        <div class="drink-menu-img">
                            <img src="images/drink/<?php echo $hinhanh;?>"
                                class="img-responsive img-curve">
                        </div>

                        <div class="drink-menu-desc">
                            <h3 class="text-left"><?php echo $tieude; ?></h3>
                            <input type="hidden" name="thucuong" value="<?php echo $tieude; ?>">
                            <p class="drink-price text-left"><?php echo $gia; ?>đ</p>
                            <input type="hidden" name="gia" value="<?php echo $gia; ?>">

                            <div class="order-label text-left">Số lượng</div>
                            <input type="number" name="soluong" class="input-responsive" value="1" required min=1>

                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Chi tiết giao hàng</legend>
                        <div class="order-label  text-left">Họ tên</div>
                        <input type="text" name="tenkhachhang" placeholder="E.g. Nguyễn Trần Đăng Khoa"
                            class="input-responsive" required>

                        <div class="order-label  text-left">Số điện thoại</div>
                        <input type="number" name="sdtkhachhang" placeholder="E.g. 0900xxxxxx" class="input-responsive" required min=1 >

                        <div class="order-label text-left">Email</div>
                        <input type="email" name="emailkhachhang" placeholder="E.g. khoab1910240@student.ctu.edu.vn"
                            class="input-responsive" required>

                        <div class="order-label text-left">Địa chỉ</div>
                        <textarea name="diachikhachhang" rows="10" placeholder="E.g. TP.HCM"
                            class="input-responsive" required></textarea>

                        <input type="submit" name="dathang" value="Hoàn tất" class="btn btn-primary" style="font-weight: bold;">
                    </fieldset>

                </form>
            </div>
        </section>
    </main>
    <?php include('footer.php') ?>