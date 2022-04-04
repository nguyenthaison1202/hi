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
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center w-100 mt-5">
    <form class="mt-5 w-50" action="" method="POST" role="form">
        <h4 class="mb-5 text-center text-danger">Bạn phải đổi mật khẩu để tiếp tục</h4>
        <div class="form-group d-block">
            <label for="newpwd" style="cursor: pointer;">Mật khẩu mới</label>
            <input name="newpassword" id="newpwd" type="password" class="form-control shadow-none border border-top-0 border-left-0 border-right-0" placeholder="New Password"/>
            <div class="has-err">
                <span class="text-danger"><?php echo(isset($err["npass"]))?$err["npass"]:"" ?></span>
            </div>
        </div>
        <div class="form-group d-block">
            <label for="confirm" style="cursor: pointer;">Xác nhận mật khẩu</label>
            <input name="confirm" id="confirm" type="password" class="form-control shadow-none border border-top-0 border-left-0 border-right-0" placeholder="Confirm Password"/>
            <div class="has-err">
                <span class="text-danger"><?php echo(isset($err["cpass"]))?$err["cpass"]:"" ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col col-xl-6 col-lg-6 col-md-6 col-sm-6">    
                <a href="./login.php" class="btn btn-secondary stretched-link">Đăng xuất </a>
            </div>
            <div class="form-group col col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>