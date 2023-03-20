<?php include('header.php');
?>

<main>
    <!-- Drink Search Section Starts -->
    <section class="drink-search-home">

        <div class="container-home">
            <div class="main-intro">
                <div class="text-intro">
                    <h1>RingRing</h1>
                    <p style="font-size: 20px; font-family: 'Nunito', sans-serif;">Lưu giữ khoảnh khắc và trao gửi những hương vị cuộc sống</p>
                </div>
                <form action="drink-search.php" method="get" class="search-drink">
                    <div>
                        <input type="text" name="s" placeholder="Tìm kiếm thức uống...">
                        <input type="submit" class="submit-search" value="Tìm kiếm" name="search">
                    </div>
                </form>
            </div>

        </div>
    </section>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carou">
            <h2 style="font-weight: bold;" class="text-center">
                Được quan tâm
            </h2>
            <h3 class="text-center">Những thông tin có thể cần thiết cho bạn!</h3>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/banner/img_banner_2.png" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block" style="color:black;">
                    <h4 style="font-size: 35px;">Những quả cam tươi</h4>
                    <p style="font-size: 20px;">Thơm ngon, bổ dưỡng cho cơ thể giúp ta có thêm Vitamin C và chất xơ.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./images/banner/img_banner_1.png" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block" style="color:black;">
                    <h4 style="font-size: 35px;">Dâu tây </h4>
                    <p style="font-size: 20px;">Cung cấp Vitamin C và giảm stress oxi hóa cho chúng ta.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./images/banner/img_banner_3.png" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block" style="color:black;">
                    <h4 style="font-size: 35px;">Kiwi thơm ngon</h4>
                    <p style="font-size: 20px;">Nó chứa một số enzim tốt cho hệ tiêu hóa và tăng cường hệ miễn dịch.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Drink Search Section Ends -->

    <!-- Categories Section Starts -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center" style="font-family: 'Nunito', sans-serif;">Thức uống được yêu thích</h2>
            <h4 class="text-center" style="font-family: 'Nunito', sans-serif; font-size: 20px;">Những hương vị được khách hàng tin dùng ưa chuộng!</h4>
            <div class="testimonials">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="category-testimonials" class="owl-carousel">
                            <!--TESTIMONIAL  -->
                            <a href="#">
                                <div class="box-3 float-container">
                                    <img src="img_drink/tra_trai_cay/tra_viet_quat.jpg" alt="travietquat" class="img-responsive img-curve">
                                    <h3 class="float-text">Trà Việt Quất</h3>
                                </div>
                            </a>

                            <a href="#">
                                <div class="box-3 float-container">
                                    <img src="img_drink/tra_trai_cay/tra_dau_tay.jpg" alt="tradautay" class="img-responsive img-curve">
                                    <h3 class="float-text">Trà Dâu Tây</h3>
                                </div>
                            </a>

                            <a href="#">
                                <div class="box-3 float-container">
                                    <img src="img_drink/tra_trai_cay/tra_tao.jpg" alt="tratao" class="img-responsive img-curve">
                                    <h3 class="float-text">Trà Táo</h3>
                                </div>
                            </a>
                            <!-- insert-post -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix">

            </div>
        </div>
    </section>
    <!-- Categories Section Ends -->

    <!-- Drink Menu Section Starts -->
    <!-- Drink Menu Section Starts -->
    <section class="drink-menu">
        <div class="container list-drink">
            <h2 class="text-center" style="margin-top: 20px;">Menu thức uống nổi bật</h2>
            <div class="row">
                <?php
                if (isset($_GET['search'])) {
                    $s = $_GET['s'];
                    $sql = "SELECT * FROM thucuong where noibat='Có' and active='Còn hàng' and tieude like '%$s%'";
                } else {
                    $sql = "SELECT * FROM thucuong where noibat='Có' and active='Còn hàng'";
                }

                $res = mysqli_query($conn, $sql);
                if ($res == true) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $tieude = $rows['tieude'];
                        $mota = $rows['mota'];
                        $gia = $rows['gia'];
                        $hinhanh = $rows['hinhanh'];
                        $noibat = $rows['noibat'];
                        $active = $rows['active'];
                ?>
                        <div class="col-md-6">
                            <div class="drink-menu-box">
                                <div class="drink-menu-img">
                                    <img src="images/drink/<?php echo $hinhanh; ?>" class="img-responsive img-curve">
                                </div>
                                <div class="drink-menu-desc">
                                    <h4>
                                        <?php echo $tieude; ?>
                                    </h4>
                                    <p class="drink-price">
                                        <?php echo $gia ?>đ
                                    </p>
                                    <p class="drink-detail">
                                        <?php echo $mota; ?>
                                    </p>
                                    <form action="addcart.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="tieude" value="<?php echo $tieude; ?>">
                                        <input type="hidden" name="mota" value="<?php echo $mota; ?>">
                                        <input type="hidden" name="gia" value="<?php echo $gia; ?>">
                                        <input type="hidden" name="hinhanh" value="<?php echo $hinhanh; ?>">
                                        <input type="hidden" name="noibat" value="<?php echo $noibat; ?>">
                                        <input type="number" name="soluong" min="1">
                                        <input type="hidden" name="active" value="<?php echo $active; ?>">
                                        <input <?php if(!isset($_SESSION['email_dangnhap'])){echo 'onclick="yeucaudangnhap()" type="button"';}else{echo "type='submit'";} ?>  class="btn btn-warning" name="submit" value='Thêm vào giỏ'>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="pt-3 offset-sm-5" style="margin-left: 47%;"><a href="drinks.php" style="color: #e99714; font-weight: bold;">Xem thêm...</a></div>

    </section>
    <!-- Drink Menu Section Ends -->
    <!-- Drink Menu Section Ends -->

</main>
<script>
    function yeucaudangnhap(){
        alert('Bạn phải đăng nhập trước khi đặt hàng');
    }

</script>
<?php include('footer.php') ?>