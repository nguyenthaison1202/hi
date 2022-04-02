<?php
include './connect.php';
    if(isset($_POST['user-name']))
    {
    $username=$_POST["user-name"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $birthday=$_POST["birthday"];
    $phone=$_POST["phone"];
    $CMNDbefore = $_POST["img-id-first"];
    $CMNDafter = $_POST["img-id-after"];
    $error=[];
    $mail="Select * from user where email='$email'";
    $query_email=mysqli_query($conn,$mail);
    $check_email=mysqli_num_rows($query_email);
    if($check_email!=0)
    {
        $error['email']='Email này đã được đăng ký'; 
    }
    else
    {
        $sql = "Insert into user(username,address,email,phone,Birthday,Cmndbefore,CmndAfter) Values('$username','$address','$email','$phone','$birthday','$CMNDbefore','$CMNDafter')";
        mysqli_query($conn,$sql);
        $tk=rand(0000000000,9999999999);
        $mk=substr(str_shuffle('abcdefgfhtytrfewdqwdafasfasfadfdafdasfds'), 0, 6);
        $cpr_tk="Select * from users where username = '$tk'";
        $cpr_pwd="Select * from users where username = '$mk'";
        $query_tk=mysqli_query($conn,$cpr_tk);
        $query_mk=mysqli_query($conn,$cpr_pwd);
        $check_tk=mysqli_num_rows($query_tk);
        $check_mk=mysqli_num_rows($query_mk);
        while($check_tk!=0 or $check_mk !=0)
        {
            if($check_tk == 1 and $check_mk == 1)
            {
                $tk=rand(0000000000,9999999999);
                $mk=substr(str_shuffle('abcdefgfhtytrfewdqwdafasfasfadfdafdasfds'), 0, 6);
            }
            elseif($check_tk ==1)
            {
                $tk=rand(0000000000,9999999999);
            }
            else
            {
                $mk=substr(str_shuffle('abcdefgfhtytrfewdqwdafasfasfadfdafdasfds'), 0, 6);
            }
        }
        echo "Tai khoan cua bạn là: ".$tk." Mật khẩu của bạn là: ".$mk;

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
    <div class="container d-flex justify-content-center">
        <form class="mt-5" action="register.php" method="POST" role="form">
            <h4 class="text-center">Đăng ký thành viên mới </h4>
            <div class="form-group">
                <label for="usr" style="cursor: pointer;">Họ và tên</label>
                <input name="user-name" id="usr" type="text" class="form-control w-100">
            </div>
            <div class="form-group">
                <label for="email" style="cursor: pointer;">Email</label>
                <input name="email" id="email" type="email" class="form-control w-100">
                <div class="has-error">
                    <span class="text-danger"> <?php echo(isset($error['email']))?$error['email']:"" ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="address" style="cursor: pointer;">Địa chỉ</label>
                <input name="address" id="address" type="text" class="form-control w-100">
            </div>
            <div class="form-group">
                <label for="birthday" style="cursor: pointer;">Ngày tháng năm sinh</label>
                <input name="birthday" id="birthday" type="date" class="form-control w-100">
            </div>
            <div class="form-group">
                <label for="phone" style="cursor: pointer;">Số điện thoại</label>
                <input name="phone" id="phone" type="tel" class="form-control w-100">
            </div>
            <div class="form-group">
                <label for="file" style="cursor: pointer;">Upload CMND mặt trước</label>
                <input type="file" onchange="loadFile(event)" class="form-control-file" id="file" name="img-id-first" accept="image/*">
                <img class="img-thumbnail" id="output" width="200"/>
                <script>
                    var loadFile = function(event) {
	                var image = document.getElementById('output');
	                image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            </div>
            <div class="form-group">
                <label for="file" style="cursor: pointer;">Upload CMND mặt sau</label>
                <input type="file" onchange="loadFile(event)" class="form-control-file" id="file" name="img-id-after" accept="image/*">
                <img class="img-thumbnail w-25" id="output"/>
                <script>
                    var loadFile = function(event) {
	                var image = document.getElementById('output');
	                image.src = URL.createObjectURL(event.target.files[0]);
                   };
                </script>
            </div>
            <button type="submit" class="btn btn-primary" >Đăng ký ngay</button>
        </form>
    </div>
</body>
</html>