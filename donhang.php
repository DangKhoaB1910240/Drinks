
<?php include('header.php') ?>
<?php 
    
    if(!isset($_SESSION['email_dangnhap'])){
        header('location: dangnhap.php');
    }
    if(!isset($_SESSION['iddh'])){
        header('location: thanhtoan.php');
    }
    
?>
    <main class="main_introd">
        <section class="body_intro">
        <h2>Thông tin đơn hàng</h2>
        <div >
            <div class="row">
                <div class="col-5">
                
                    <?php 
                        $sql = "SELECT * FROM donhang where id = ".$_SESSION['iddh'];
                        $res = mysqli_query($conn,$sql);
                        $tongtien= 0;
                        if($res == true){
                            while($rows = mysqli_fetch_assoc($res)){
                                $tongtien = $rows['tongdonhang'];
                    ?>
                    <div class="input-group mb-4" style="width:60%">
                        <label style="width:30%;font-weight:bold;" class="my-2 " for="">Họ tên</label>
                        <input type="text" class="mx-2  form-control" name="hoten" value="<?php if(isset($rows['hoten'])) echo $rows['hoten']; ?>" disabled>
                    </div>
                    
                    <div class="input-group mb-4" style="width:60%">
                        <label style="width:30%;font-weight:bold;" class="my-2 " for="">Địa chỉ</label>
                        <input type="text" class="mx-2  form-control" value="<?php if(isset($rows['diachi'])) echo $rows['diachi']; ?>" name="diachi" disabled>
                    </div>
                    <div class="input-group mb-4" style="width:60%">
                        <label style="width:30%;font-weight:bold;" class="my-2 " for="">Email</label>
                        <input type="text" class="mx-2  form-control" value="<?php if(isset($rows['email'])) echo $rows['email']; ?>" name="email" disabled>
                    </div>

                    <div class="input-group mb-4" style="width:60%">
                        <label style="width:30%;font-weight:bold;" class="my-2 " for="">Số điện thoại</label>
                        <input type="text" class="mx-2  form-control" value="<?php if(isset($rows['sodienthoai'])) echo $rows['sodienthoai']; ?>" name="sodienthoai" disabled>
                    </div>
                    <div class="input-group mb-4" style="width:60%;display:block;">
                        <label class="my-2 " style="font-weight:bold;" for="">Phương thức thanh toán</label><br>
                        <div>
                            <?php 
                                if(isset($rows['phuongthucthanhtoan'])){
                                    if($rows['phuongthucthanhtoan']==1){
                                        echo "Thanh toán khi nhận hàng";
                                    }
                                    if($rows['phuongthucthanhtoan']==2){
                                        echo "Chuyển khoản";
                                    }
                                    if($rows['phuongthucthanhtoan']==3){
                                        echo "Momo";
                                    }
                                    if($rows['phuongthucthanhtoan']==4){
                                        echo "Thanh toán online";
                                    }
                                }
                            ?>
                        </div>
                        
                    </div>
                    <div class="input-group mb-4" style="width:60%;display:block;">
                        <label class="my-2 " style="font-weight:bold;" for="">Trạng thái: 
                            <?php 
                                if(isset($rows['xacnhan'])){
                                    if($rows['xacnhan'] == 0){
                                        echo '<span class="text-info">Chờ xác nhận</span>';
                                    }
                                    if($rows['xacnhan'] == 1){
                                        echo '<span class="text-success">Đã xác nhận</span>';
                                    }
                                } 
                            ?>
                        </label><br>
                    </div>
                    <div class="input-group mb-4" style="width:60%;display:block;">
                        <label class="my-2 " style="font-weight:bold;" for="">Thanh toán: 
                            <?php 
                                if(isset($rows['thanhtoan'])){
                                    if($rows['thanhtoan'] == 0){
                                        echo '<span class="text-info">Chưa thanh toán</span>';
                                        if($rows['phuongthucthanhtoan'] ==4){
                                            echo '<div><a href="/drink-order/vnpay_php/index.php"> >Thanh toán liền!<</a></div>';
                                        }
                                        
                                    }
                                    if($rows['thanhtoan'] == 1){
                                        echo '<span class="text-success">Đã thanh toán</span>';
                                    }
                                } 
                            ?>
                        </label><br>
                    </div>
                    <?php 
                        if(isset($rows['xacnhan']) && $rows['xacnhan'] == 0){
                            echo '<div>
                            <p><a onclick="canhBao()" style="cursor:pointer;color:blue">Bạn có muốn hủy đơn hàng không?</a></p>
                            <div class="text-warning"> <i>Sau khi đơn hàng được xác nhận bạn sẽ không được hủy đơn hàng.</i></div>
                        </div>';
                        }
                    ?>
                    
                    <?php            
                                break;
                            }
                        }
                    ?>
                    
                </div>
                <div class="col-7">

                    <div><b>Tổng tiền: </b><?php echo number_format($tongtien, 0, '', ',')." vnđ"; ?> </div>
                    <table class="table text-center" >
                        <thead class=" table-dark">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Gía</th>
                            <th>Hình ảnh</th>

                        </thead>
                        <tbody>
                            <?php 
                            
                                $sql = "SELECT * FROM cart where iddonhang = ".$_SESSION['iddh'];
                                $res = mysqli_query($conn,$sql);
                                $i=0;
                                if($res == true){
                                    while($rows = mysqli_fetch_assoc($res)){$i++;
                            ?>
                            <tr>

                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['tensp']; ?></td>
                                <td><?php echo $rows['soluong']; ?></td>
                                <td><?php echo number_format($rows['dongia'], 0, '', ','); ?></td>
                                <td><img style="width:40%" src="/drink-order/images/drink/<?php echo $rows['img']; ?>"></td>  
                            </tr>
                            <?php            
                                    }
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        
        

        </div>
        </section>
    </main>

    <?php include('footer.php') ?>





