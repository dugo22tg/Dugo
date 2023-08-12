<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./index.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Danh sách sinh viên</h1>
            <div class="banner">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm sinh viên
            </button>
                <form action="" method="post" class="timkiem">
                    <input type="text" class="form-control" name="noidung">  
                    <button type="submit" name="btn" value="Search" >Tìm kiếm </button>
                </form>
            </div>
        </div>
    <table class="table table-dark table-hover">
    <thead>
        <tr>
            <th>Mã Sinh Viên</th>
            <th>Họ Tên</th>
            <th>Lớp</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
        <tbody>  

    <?php 
        
        if (isset($_POST['btn'])) {
            $noidung = $_POST['noidung'];
            $lietke_sql = "SELECT * FROM sinhvien WHERE hoten LIKE '%$noidung%'";
        } else {
            $lietke_sql = "SELECT * FROM sinhvien ORDER BY lop, hoten";
        }
        
            require_once 'ketnoi.php';
            $result = mysqli_query($conn, $lietke_sql);

            while ($r = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td class="td1"><?php echo $r['masv'];?></td>
                <td><?php echo $r['hoten'];?></td>
                <td><?php echo $r['lop'];?></td>
                <td>
                    <a href="sua.php?sid=<?php echo $r['id'];?>" class="btn btn-info">Sửa</a> 
                    <a onclick="return confirm('Đồng ý xóa ?');" href="xoa.php?sid=<?php echo $r['id'];?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
                <?php
            }
    ?>
        </tbody>
    </table>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                <form action="them.php" method="post">
                    <div class="form-group">
                    <label for="hoten">Họ tên:</label>
                    <input type="text" class="form-control" id="hoten" name="hoten">
                    </div>
                    <div class="form-group">
                    <label for="masv">Mã sinh viên:</label>
                    <input type="text" class="form-control" id="masv" name="masv">
                    </div>
                    <div class="form-group">
                    <label for="lop">Tên lớp:</label>
                    <input type="text" class="form-control" id="lop" name="lop">
                    </div>
                    <button type="submit" class="btn btn-success">Thêm sinh viên</button>
            </form>
        </div>
        
        <!-- Modal footer -->
        
    </div>
</div>
    </div>
</body>
</html>