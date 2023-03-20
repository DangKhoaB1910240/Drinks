<?php include('header.php') ?>
<br><br><br>
<div class="container show_admin">
    <h2 class="text-center mt-4" style="background-color:#FFEFD5;">Danh sách thức uống</h2>
            <?php 
                if(isset($_SESSION['themthucuong1'])){
                    echo $_SESSION['themthucuong1'] ;
                    unset($_SESSION['themthucuong1']) ;
                }
                if(isset($_SESSION['deletedrink'])){
                    echo $_SESSION['deletedrink'];
                    unset($_SESSION['deletedrink']);
                }
            ?>
    <div class="text-center">
        <table class="table table-bordered">
            <thead>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Nổi bật</th>
                <th>Trạng thái</th>
                <th>Lựa chọn</th>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM thucuong";
                    $res = mysqli_query($conn,$sql);
                    $index = 0;
                    if($res==true){
                        while($rows = mysqli_fetch_assoc($res)){
                            $index++;
                            $id = $rows['id'];
                            $tieude = $rows['tieude'];
                            $mota = $rows['mota'];
                            $gia=$rows['gia'];
                            $hinhanh = $rows['hinhanh'];
                            $noibat = $rows['noibat'];
                            $active = $rows['active'];
                            ?>
                                <tr>
                                    <td><?php echo $index?></td>
                                    <td><?php echo $tieude?></td>
                                    <td><?php echo $mota?></td>
                                    <td><?php echo $gia."đ"?></td>
                                    <td>
                                    <?php
                                        if($hinhanh !=''){
                                            ?>
                                            <img src="../images/drink/<?php echo $hinhanh;?>" style="width:100px;" >
                                            <?php
                                        }else{
                                            echo "<div class='text-danger mb-3 text-center'><b>Không có hình ảnh hiển thị</b></div>";
                                        }
                                    ?>
                                    </td>
                                    <td><?php echo $noibat?></td>
                                    <td><?php echo $active?></td>

                                    <td style=""><a href="editdrink.php?id=<?php echo $id ?>" class="btn btn-warning" style="font-size:120%">Chỉnh sửa</a>
                                    <a href="deletedrink.php?id=<?php echo $id ?>" class="btn btn-danger" style="font-size:120%">Xóa</a>
                                </td>
                                </tr>
                                
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <a href="insertdrink.php" class="btn" style="font-size:100%; background-color: #e99714;">Thêm thức uống</a>
</div>

<?php include('footer.php') ?>