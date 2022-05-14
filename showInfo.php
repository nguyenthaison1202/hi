<?php
include './connect.php';
if(!isset($_SESSION['usr']))
{
    header('Location: login.php');
    die();
}
    $usrs=$_SESSION['usr'];
    $sql = "Select * from login where username='$usrs'";
    $look=mysqli_query($conn,$sql);
    $data_user=mysqli_fetch_assoc($look);
    $email=$data_user['email'];
    $sql_email = "Select * from logup where email='$email'";
    $find=mysqli_query($conn,$sql_email);
    $data=mysqli_fetch_assoc($find);
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
                      <a class="dropdown-item" href="./userInfo.php">Thông tin khách hàng</a>
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
    <div class="container d-flex justify-content-center mt-5">
    <table border="0" cellpadding="10" cellspacing="10">
        <tr>
            <td>User Name: </td>
            <td><?php echo(isset($data['username']))?$data['username']:"" ?></td>
        </tr>
        <tr>
            <td>Birthday: </td>
            <td><?php echo(isset($data['birthday']))?$data['birthday']:"" ?></td>
        </tr>
        <tr>
            <td>Address: </td>
            <td><?php echo(isset($data['address']))?$data['address']:"" ?></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><?php echo(isset($data['email']))?$data['email']:"" ?></td>
        </tr>
        <tr>
            <td>Phone: </td>
            <td><?php echo(isset($data['phone']))?$data['phone']:"" ?></td>
        </tr>
        <tr>
            <td>CMND mat truoc: </td>
            <td><?php echo(isset($data['CMNDbefore']))?$data['CMNDbefore']:"" ?></td>
        </tr>
        <tr>
            <td>CMND mat sau: </td>
            <td><?php echo(isset($data['CMNDafter']))?$data['CMNDafter']:"" ?></td>
        </tr>
        <tr>
            <td colspan="2"><a href="homePage.php" class="btn btn-primary w-100" >Về lại trang chủ</a></td>
        </tr>
    </table>
    </div>


</body>
</html>