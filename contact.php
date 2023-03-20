<?php
    include('header.php');
    if(isset($_POST['submit'])){
    $hoten = $email = $noidung = $hinhthuc= '';
    if(isset($_POST['hoten'])){
        $hoten = $_POST['hoten'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['hinhthuc'])){
        $hinhthuc = $_POST['hinhthuc'];
    }
    if(isset($_POST['noidung'])){
        $noidung = $_POST['noidung'];
    }
    //fix lỗi SQL Injection
    $hoten = str_replace('\'','\\\'',$hoten);
    $email = str_replace('\'','\\\'',$email);
    $noidung = str_replace('\'','\\\'',$noidung);
    $errors = array();
    if($hoten == ''){
        $errors['hoten'] = 'Vui lòng nhập họ tên của bạn';
    }
    if($email == ''){
        $errors['email'] = 'Vui lòng nhập email của bạn';
    }
    if($hinhthuc ==''){
        $errors['hinhthuc'] = 'Vui lòng chọn hình thức phản hồi';
    }
    if($noidung == ''){
        $errors['noidung'] = 'Vui lòng nhập nội dung phản hồi';
    }
    if(!$errors){
        $sql = "INSERT into phanhoi SET hoten = '$hoten', email = '$email', hinhthuc='$hinhthuc',noidung='$noidung'";
        $kq =  mysqli_query($conn,$sql) ;
        if($kq == true){
            $message = "Gửi phản hồi thành công! Xin cám ơn quý khách đã đóng góp ý kiến để RingRing hoàn thiện hơn.";
            echo "<script>alert('$message'); location.href = 'http://localhost/drink-order/contact.php';</script>";
        }
    }else{
        $message = "Gửi phản hồi thất bại! Quý khách vui lòng điền đầy đủ thông tin để thực hiện góp ý cho RingRing.";
            echo "<script>alert('$message'); location.href = 'http://localhost/drink-order/contact.php';</script>";
    }

    }
?>
<main class="main">
    <article class="main_contact">
        <section>
            <h1>Thông Tin Liên Hệ</h1>
            <div class="main_contact_detail">
                <div class="contact_detail">
                    <p>
                        <b><i class="fas fa-home"></i> Địa chỉ:</b>
                        Số 123, Đường ABC, Phường Xuân Khánh, TP.Cần Thơ
                    </p>
                    <p>
                        <b><i class="fas fa-phone"></i> Đường dây nóng:</b>
                        091 234 5678 - 087 654 3210
                    </p>
                    <p>
                        <b><i class="fa fa-envelope"></i> Email:</b>
                        ringring@gmail.com
                    </p>
                    <p>
                        <b><i class="fab fa-facebook-f"></i> Facebook:</b>
                        facebook.com/ringring
                    </p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d8568.788963881454!2d105.77671880857076!3d10.032760949820632!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1649639017132!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <section>
            <h2>Ý kiến đóng góp từ bạn</h2>
            <h3>Những ý kiến đánh giá, đóng góp từ quý khách sẽ giúp RingRing dần trở nên hoàn thiện hơn!
                <?php
                if (isset($_SESSION['phanhoi'])) {
                    echo $_SESSION['phanhoi'];
                    unset($_SESSION['phanhoi']);
                }
                ?>
            </h3>
            <form class="form_contribute" method="POST">
                <div class="form-group">
                    <table class="table_contribute">
                        <tr>
                            <td><label for="exampleFormControlInput1"><i class="fa fa-user"></i> Họ và tên:</label>
                            </td>
                            <td><input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Vui lòng nhập họ tên của bạn" size="30" name="hoten" required>

                            </td>

                        </tr>
                        <tr>
                            <td><label for="exampleFormControlInput1"><i class="fa fa-envelope"></i> Email:</label>
                            </td>
                            <td><input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Vui lòng nhập email của bạn" size="30" name="email" required>


                            </td>
                        </tr>
                        <tr>
                            <td><label for="exampleFormControlSelect1"><i class="fas fa-bars"></i> Hình
                                    thức:</label></td>
                            <td>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="hinhthuc">
                                    <option selected value=''> Chọn hình thức</option>
                                    <option value="Thái độ nhân viên">Về thái độ phục vụ khách hàng</option>
                                    <option value="Chất lượng sản phẩm">Về chất lượng sản phẩm</option>
                                    <option value="Giá thành sản phẩm">Về giá thành sản phẩm</option>
                                </select>


                            </td>
                        </tr>
                        <tr>
                            <td class="alignB"><label for="exampleFormControlTextarea1" class="form-label"><i class="fas fa-file-alt"></i> Nội dung:</label></td>
                            <td colspan="2">
                                <textarea rows="7" cols="50" placeholder="  Nội dung đóng góp" id="noidung" name="noidung"></textarea>


                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button name="submit">Gửi</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>

        </section>
    </article>
</main>
<?php include('footer.php') ?>