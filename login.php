<?php
include './connect.php';
    if(isset($_POST["usr"]))
    {
        $err=[];
        $username=$_POST["usr"];
        $password=$_POST["password"];
        $cpr_tk="Select * from users where username = '$username'";
        $cpr_pwd="Select * from users where password = '$password'";
        $query_tk=mysqli_query($conn,$cpr_tk);
        $query_mk=mysqli_query($conn,$cpr_pwd);
        $data=mysqli_fetch_assoc($query_tk);
        $check_tk=mysqli_num_rows($query_tk);
        $check_mk=mysqli_num_rows($query_mk);
        if($check_tk ==0)
        {
            $err['$username']="Tài khoản không đúng";
        }
        if($check_mk == 0)
        {
            $err['$password']="Mật khẩu không đúng";
        }
        // if(empty($err))
        // {

        //     header('location: confirmPass.php');
        // }
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
                    <a class="nav-link login active" href="#">Đăng nhập</a>
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


    <form action="login.php" method="POST" role="form">
            <div class="container">
            <h4 class="text-center mt-5">Form đăng nhập</h4>
            <div class="form-group">
                <label for="usr" class="usr" style="cursor: pointer;">Tài khoản</label>
                <input name="usr" id="usr" type="text" class="form-control shadow-none border border-top-0 border-left-0 border-right-0 w-75" placeholder="Tài khoản " />
                <div class="has-error">
                    <span class="text-danger"><?php echo(isset($err['$username']))?$err['$username']:"" ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="usr" style="cursor: pointer;">Mật khẩu</label>
                <input name="password" id="pwd" type="password" class="form-control shadow-none border border-top-0 border-left-0 border-right-0 w-75" placeholder="Mật khẩu"/>
                <div class="has-error">
                    <span class="text-danger"><?php echo(isset($err['$password']))?$err['$password']:"" ?></span>
                </div>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck" name="rmr-me">
                <label class="custom-control-label" for="customCheck">Ghi nhớ đăng nhập</label>
            </div>
            <div class="row btn_groups">
                <div class="col-sm-12 pr-5">
                    <button type='button' class="btn btn-sub mr-2" onclick="Redirect();">Tạo tài khoản</button>
                    <button type="submit" class="btn btn_custom" >Đăng ký ngay</button>
                </div>                       
            </div>
        </div>
    </form>
    <footer class="footer bg-dark text-white"><h4 class="footer-font"> ©Bản quyền thuộc về Phát - Phúc - Sơn</h4></footer>

</body>

<script src="./loginFirst.js"></script>
</html>