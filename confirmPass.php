<?php
    include './connect.php';
    if(isset($_POST["newpassword"]))
    {
        $username=$_SESSION['username'];
        $npass=$_POST["newpassword"];
        $cpass=$_POST["confirm"];
        $err=[];
        if(empty($npass))
        {
            $err["npass"]="Bạn chưa nhập mật khẩu";
        }
        if($npass!=$cpass)
        {
            $err["cpass"]="Mật khẩu xác nhận không trùng khớp";
        }
        if(empty($err))
        {
            $sql="update users set password=$cpass where username=$username";
            mysqli_query($conn,$sql);
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7b78e77d77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./loginFirst.css">
    
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
                <a class="navbar-brand" href="#">
                    <i class="fa fa-building"></i>
                    <h1 class="navbar-symbol">PPS Bank</h1>
                </a>
                <ul class="navbar-nav menuItems mb-5">
                  <li class="nav-item">
                    <a class="nav-link login" href="./login.php">Đăng nhập</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link signup" href="./register.php">Đăng kí</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Xem Thêm
                    </a>
                    <div class="dropdown-menu ">
                      <a class="dropdown-item" href="#">Thông tin ngân hàng</a>
                      <a class="dropdown-item" href="#">Quyền lợi khách hàng</a>
                      <a class="dropdown-item" href="#">Hỏi & Đáp</a>
                    </div>
                  </li>
                </ul>
                <i class="fa fa-bars text-white menu-icon" onclick="Handle()"></i>
            </nav>

    <form  action="" method="POST" role="form">
        <div class="container">
        <h4 class="mb-5 text-center text-danger">Bạn phải đổi mật khẩu để tiếp tục</h4>
        <div class="form-group d-block">
            <i class="fa fa-lock"></i>
            <label for="newpwd" style="cursor: pointer;">Mật khẩu mới</label>
            <input name="newpassword" id="newpwd" type="password" class="form-control shadow-none border border-top-0 border-left-0 border-right-0 w-75" placeholder="New Password"/>
            <div class="has-err">
                <span class="text-danger"><?php echo(isset($err["npass"]))?$err["npass"]:"" ?></span>
            </div>
        </div>
        <div class="form-group d-block">
        <i class="fa fa-key"></i>
            <label for="confirm" style="cursor: pointer;">Xác nhận mật khẩu</label>
            <input name="confirm" id="confirm" type="password" class="form-control shadow-none border border-top-0 border-left-0 border-right-0 w-75" placeholder="Confirm Password"/>
            <div class="has-err">
                <span class="text-danger"><?php echo(isset($err["cpass"]))?$err["cpass"]:"" ?></span>
            </div>
        </div>

        <div class="row btn_groups">
                <div class="col-sm-12 pr-5">
                    <button type='button' class="btn btn-sub mr-2" onclick="logOut();">Đăng xuất</button>
                    <button type="submit" class="btn btn_custom" >Đăng ký ngay</button>
                </div>                       
        </div>
    </div>
    </form>
    <footer class="footer bg-dark text-white"><h4 class="footer-font"> ©Bản quyền thuộc về Phát - Phúc - Sơn</h4></footer>
</body>
<script src='./loginFirst.js'></script>
</html>