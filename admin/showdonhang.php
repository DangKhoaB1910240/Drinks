<?php
    include('issell.php') ;
    $email = $_SESSION['email_dangnhapadmin'];
    $sql = "SELECT * FROM admin where email = '$email'";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        while($rows = mysqli_fetch_assoc($res)){
            if($rows['isSell'] == 0){
                header('location: showdrink.php');
            }
        }
    }
?>
<br><br><br>
<div class="container show_admin">
    <h2 class="text-center mt-4" style="background-color:#FFEFD5;">Danh sách đơn hàng</h2>
    <div class="text-center">
        <table class="table table-bordered">
            <thead>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Tổng đơn hàng</th>
                <th>Phương thức thanh toán</th>
                <th>Thanh toán</th>
                <th>Xác nhận</th>
                
                
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM donhang";
                    $res = mysqli_query($conn,$sql);
                    $index = 0;
                    if($res==true){
                        while($rows = mysqli_fetch_assoc($res)){
                            $index++;
                            
                            ?>
                                <tr>
                                    <td><?php echo $index; ?></td>
                                    <td><?php echo $rows['hoten'];?></td>
                                    <td><?php echo $rows['email'];?></td>
                                    <td><?php echo $rows['diachi'];?></td>
                                    <td><?php echo $rows['sodienthoai'];?></td>
                                    <td><?php echo $rows['ngaydat'];?></td>
                                    <td><?php echo $rows['tongdonhang'];?></td>
                                    <td><?php if(isset($rows['phuongthucthanhtoan'])){
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
                                }?></td>
                                <td>
                                        <?php 
                                            if(isset($rows['thanhtoan'])){
                                                if($rows['thanhtoan'] == 0){
                                                    echo '<a class="text-info" href="xacnhanthanhtoan.php?id='.$rows['id'].'"><i>Chưa thanh toán</i></a>';
                                                }
                                                if($rows['thanhtoan'] == 1){
                                                    echo '
                                                    <span class="text-success" style="font-weight:bold">Đã thanh toán</span> |
                                                    <a class="text-danger" href="xacnhanthanhtoan.php?idhuy='.$rows['id'].'">(Hủy thao tác)</a>
                                                    ';
                                                }
                                            } 
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if(isset($rows['xacnhan'])){
                                                if($rows['xacnhan'] == 0){
                                                    echo '<a class="text-info" href="xacnhandonhang.php?id='.$rows['id'].'"><i>Chờ xác nhận</i></a>';
                                                }
                                                if($rows['xacnhan'] == 1){
                                                    echo '<span class="text-success" style="font-weight:bold">Đã xác nhận</span> |
                                                    <a class="text-danger" href="xacnhandonhang.php?idhuy='.$rows['id'].'">(Hủy thao tác)</a>';
                                                }
                                            } 
                                        ?>
                                    </td>
                                    
                                </tr>
                                
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    
</div>

<?php include('footer.php') ?>