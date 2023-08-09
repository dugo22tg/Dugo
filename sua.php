<?php
$id = $_GET['sid'];

require_once 'ketnoi.php';

$edit_sql = "SELECT * FROM sinhvien where id = $id";

$result = mysqli_query($conn, $edit_sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them sinh vien</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Sửa dữ liệu</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $id; ?>" id="">
            <div class="form-group">
                <label for="hoten">Họ tên:</label>
                <input type="text" class="form-control" id="hoten" name="hoten" value="<?php echo $row['hoten'] ?>">
            </div>
            <div class="form-group">
                <label for="masv">Mã sinh viên:</label>
                <input type="text" class="form-control" id="masv" name="masv"value="<?php echo $row['masv'] ?>">
            </div>
            <div class="form-group">
                <label for="lop">Tên lớp:</label>
                <input type="text" class="form-control" id="lop" name="lop"value="<?php echo $row['lop'] ?>">
            </div>
            <button type="submit" class="btn btn-success">Cập nhật thông tin</button>
        </form>
    </div>    
</body>
</html>