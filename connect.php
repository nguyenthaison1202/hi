<?php
    //Để sử dụng được thì ở phpAdmin của xamp tạo 1 file phucvo trong file đó tạo thêm 1 file có tên là user
    //Trong file user tạo 7 cột với cột đầu là id là primary key, 6 cột sau để lưu dữ liệu của file đăng ký
    //NếU là hình ảnh thì để biến là varbinary là ok.
    //Nếu không để tên phucvo thì trong biến $conn ở dưới đổi tên thành file tên mà fen đặt là ok.
    $conn= mysqli_connect("localhost","root","","phucvo");
    mysqli_set_charset($conn,"utf8");
?>