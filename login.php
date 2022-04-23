<?php
include './connect.php';
    if(isset($_POST["usr"]))
    {
        $err=[];
        $username=$_POST["usr"];
        $password=$_POST["password"];
        $cpr_tk="Select * from login where username = '$username'";
        $cpr_pwd="Select * from login where password = '$password'";
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
        if(empty($err))
        {
            $_SESSION['usr']=$data['username'];
            $username = $_SESSION['usr'];
            $sql = "select confirm from logup where email = (select email from login where username = '$username')";
            $data=mysqli_query($conn,$sql);
            $print=mysqli_fetch_assoc($data);
            if($print['confirm'] === "-1")
            {
                $errorMessage = '<h3 class="text-danger text-center pt-5"> Tài khoản này đã bị vô hiệu hóa, vui lòng liên hệ tổng đài 18001008 </h3>';
            }
            else{
                header('location: homePage.php');
            }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center w-100  mt-5">
        <form class="mt-5 w-50" action="login.php" method="POST" role="form">
            <h4 class="text-center mt-5">Form đăng nhập</h4>
            <div class="form-group">
                <label for="usr" class="usr" style="cursor: pointer;">UserName</label>
                <input name="usr" id="usr" type="text" class="form-control shadow-none border border-top-0 border-left-0 border-right-0" placeholder="User-name" />
                <div class="has-error">
                    <span class="text-danger"><?php echo(isset($err['$username']))?$err['$username']:"" ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="usr" style="cursor: pointer;">Password</label>
                <input name="password" id="pwd" type="password" class="form-control shadow-none border border-top-0 border-left-0 border-right-0" placeholder="Password"/>
                <div class="has-error">
                    <span class="text-danger"><?php echo(isset($err['$password']))?$err['$password']:"" ?></span>
                    <span class="text-danger"><?php echo(isset($errorMessage))?$errorMessage:"" ?></span>
                </div>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck" name="rmr-me">
                <label class="custom-control-label" for="customCheck">Remember me</label>
            </div>
            <div class="form-row">
                <div class="form-group col col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <a href="./register.php" class="btn btn-secondary stretched-link">Tạo tài khoản</a>
                </div>
                <div class="form-group col col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-primary" >Đăng nhập</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
