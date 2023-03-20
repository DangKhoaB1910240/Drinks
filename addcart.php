
<?php include('header.php') ?>
<?php 
    if(!isset($_SESSION['email_dangnhap'])){
        header('location: dangnhap.php');
    }
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $tieude = $_POST['tieude'];
        $mota = $_POST['mota'];
        $gia = $_POST['gia'];
        $hinhanh = $_POST['hinhanh'];
        $noibat = $_POST['noibat'];
        $active = $_POST['active'];
        $soluong = 1;
        if(isset($_POST['soluong']) && $_POST['soluong'] > 0){
            $soluong = $_POST['soluong'];
        }
        
        $check = 0 ;
        // Kiểm tra xem sản phẩm đã nằm trong giỏ hàng chưa
        //Nếu có rồi thì cập nhật số lượng
        $i=0;//tạo i để kiểm tra xem $item thứ mấy ?
        foreach ($_SESSION['giohang'] as $item) {
            if($id == $item[0]){
                $soluongmoi = $soluong + (int)$item[5];
                $_SESSION['giohang'][$i][5] = $soluongmoi;
                $check = 1;
                break;
            }
            $i++;
        }
        
        //Còn không thì sẽ add vào mảng $_SESSION['giohang']
        if($check == 0){
            $item = array($id,$tieude,$mota,$gia,$hinhanh,$soluong,$noibat,$active);
            $_SESSION['giohang'][] = $item;
        }       
        //Khởi tạo 1 mảng con trước khi đưa vào giỏ hàng
        
        
        header('location: drinks.php');
    }
    
?>
    <main class="main_introd">
        <section class="body_intro">
        <h2>Thức uống trong giỏ hàng</h2>
        <a style="font-weight:bold" class="btn btn-success" href="thanhtoan.php">Tiến hành thanh toán</a>
        <?php 
            if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0){
                echo '
                <table class="table text-center">
                    <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Gía</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Nổi bật</th>
                        <th>Còn hàng</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                ';
                $i = 0;
                $j = -1;
                $sum = 0;
                foreach ($_SESSION['giohang'] as $item) {
                    $i++;
                    $j++;
                    $tt = (int)$item[3]*(int)$item[5];
                    $sum+=$tt;
                    echo '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.number_format($item[3], 0, '', ',').'</td>
                        <td><img style="width:50%" src="/drink-order/images/drink/'.$item[4].'"></td>
                        <td>'.$item[5].'</td>
                        <td>'.number_format($tt, 0, '', ',').'</td>
                        <td>'.$item[6].'</td>
                        <td>'.$item[7].'</td>
                        <td><a href="deletecart.php?i='.$j.'">Xóa</a></td>
                    </tr>
                    ';
                }
                echo "</tbody></table>";
                
            }else{
                echo"<div class='text-center' style='font-weight:bold'>
                Không có sản phẩm trong giỏ hàng.</div>";
            }
        ?>
        <br>
        <div style="font-size:1.5rem;font-weight:bold;font-style: italic;" class="text-right">
            <u>Tổng cộng:</u> 
            <?php if(!isset($_SESSION['giohang']) || $_SESSION['giohang'] == []){
                echo "0 vnđ";
            }else{
                echo number_format($sum, 0, '', ',')." vnđ"; 
            }  ?>
        </div>
        <div class="text-center">
        
        <a class="btn btn-info" style="font-weight:bold" href="drinks.php">Tiếp tục mua hàng</a>  <a style="font-weight:bold" class="btn btn-warning" href="deletecart.php">Xóa giỏ hàng</a>
        

        </div>
        </section>
    </main>

    <?php include('footer.php') ?>





