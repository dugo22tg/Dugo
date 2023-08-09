<?php
    $ht = $_POST['hoten'];
    $masv = $_POST['masv'];
    $lop = $_POST['lop'];
    
    require_once 'ketnoi.php';

    $themsql = "INSERT INTO sinhvien(masv, hoten, lop) 
    VALUES('$masv', '$ht', '$lop')";
    
    if(mysqli_query($conn, $themsql)){
        header("Location: lietke.php");
    }
    ?>