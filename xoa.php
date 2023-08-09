<?php
$id = $_GET['sid'];
require_once 'ketnoi.php';

$xoa_sql = "DELETE FROM sinhvien WHERE id=$id";
mysqli_query($conn, $xoa_sql);
header("Location: lietke.php");