<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Danh sách sinh viên</h1>
            <a href="them.html" class="btn btn-primary" >Thêm Sinh Viên</a>
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
        require_once 'ketnoi.php';

        $lietke_sql = "SELECT * FROM sinhvien ORDER BY lop, hoten";

        $result = mysqli_query($conn, $lietke_sql);

        while ($r = mysqli_fetch_assoc($result)){
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
            <?php
        }
    ?>
        </tbody>
    </table>
    </div>
</body>
</html>