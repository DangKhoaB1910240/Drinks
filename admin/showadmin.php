<?php
    include('isadmin.php') ;
    
?>

<br><br>
<div class="container show_admin">
    <h2 class="text-center mt-4" style="background-color:#FFEFD5;">Danh sách Admin</h2>
            <?php 
                if(isset($_SESSION['themadmin1'])){
                    echo $_SESSION['themadmin1'];
                    unset($_SESSION['themadmin1']);
                }
                if(isset($_SESSION['deleteadmin'])){
                    echo $_SESSION['deleteadmin'];
                    unset($_SESSION['deleteadmin']);
                }
            ?>
    <div class="text-center">
        <table class="table table-bordered">
            <thead>
                <th>STT</th>
                <th>Email</th>
                <th>Mật khẩu đã mã hóa</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM admin";
                    $res = mysqli_query($conn,$sql);
                    $index = 0;
                    if($res==true){
                        while($rows = mysqli_fetch_assoc($res)){
                            $index++;
                            $id = $rows['id'];
                            $email = $rows['email'];
                            $matkhau = $rows['matkhau'];
                            ?>
                                <tr>
                                    <td><?php echo $index?></td>
                                    <td><?php echo $email?></td>
                                    <td><?php echo $matkhau?></td>
                                    <td style=""><a href="deleteadmin.php?id=<?php echo $id ?>" class="btn btn-danger mt-2" style="font-size:120%">Xóa</a></td>
                                </tr>
                                
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <a href="insertadmin.php" class="btn" style="font-size:100%; background-color: #e99714;">Thêm admin</a>
</div>
<br>
<?php include('footer.php') ?>