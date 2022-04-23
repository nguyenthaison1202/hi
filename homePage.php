<?php
    include './connect.php';
    if(!isset($_SESSION['usr']))
    {
        header('Location: login.php');
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7b78e77d77.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1 class="navbar-symbol"> <i class="fa fa-building mr-2"></i>PPS bank</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Xem Thêm
                    </a>
                    <div class="dropdown-menu ">
                      <a class="dropdown-item" href="showInfo.php">Thông tin khách hàng</a>
                      <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                      <a class="dropdown-item" href="#">Hỏi & Đáp</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Đăng xuất</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php
        $username = $_SESSION['usr'];
        $sql = "select confirm from logup where email = (select email from login where username = '$username')";
        $data=mysqli_query($conn,$sql);
        $print=mysqli_fetch_assoc($data);
        if($print['confirm'] === '0')
        {
            echo '<h3 class="text-danger text-center pt-5">Tài khoản đang chờ xác minh </h3>';
        }
        else if($print['confirm'] === "1")
        {
            echo '<h3 class="text-danger text-center pt-5">Tài khoản đã xác minh </h3>';
        }
        else if($print['confirm'] === "-1")
        {
            header('Location: login.php');
            die();
        }
     ?>
</body>
</html>