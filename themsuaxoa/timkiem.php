<?php
// $hoten = $_GET['sht'];
// $timkiem = $_POST['timkiem'];
// require_once 'ketnoi.php';
// $timkiem_sql = "SELECT * FROM sinhvien where hoten like $hoten";
// $result = mysqli_query($conn,$timkiem_sql);
// if(mysqli_query($conn, $themsql)){
//     header("Location: lietke.php");
// }
if(isset($_POST["search"])){
    $s = $_POST["txttimkiem"];
    if($s == ""){
        echo "Vui lòng nhập vào thanh tìm kiếm!";
        echo "<a href='lietke.php'>Home</a>";
    }else{
        $timkiem_sql = "SELECT * FROM sinhvien where hoten like '%$s%'";
        $qr = mysqli_query($conn,$timkiem_sql);
        $count = mysqli_num_rows($qr);
        if($count <= 0){
            echo "Không tìm thấy kết quả!";
            echo "<a href='lietke.php'>Home</a>";
        }else{
            echo "Tìm thấy ". $count . " Kết quả";
            ?>

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Mã Sinh Viên</th>
                        <th>Họ Tên</th>
                        <th>Lớp</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>   
            <?php
            while($row = mysqli_fetch_array($qr)){ 
                ?>
            <tr>
                <td><?php echo $r['masv'];?></td>
                <td><?php echo $r['hoten'];?></td>
                <td><?php echo $r['lop'];?></td>
                <td>
                    <a href="sua.php?sid=<?php echo $r['id'];?>" class="btn btn-info">Sửa</a> 
                    <a onclick="return confirm('Đồng ý xóa ?');" href="xoa.php?sid=<?php echo $r['id'];?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            <?php }
            ?>
            </table>
            <a href="lietke.php">Home</a>
            <?php
        }
    }
}
?>