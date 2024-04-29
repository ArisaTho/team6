<?php
    session_start();
    require('connect.php');
    require('function.php');

    
    if(isset($_SESSION['id']))
    {
        header("Location:index.php");
    }


    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $check = SELECT_ID($conn,"tb_members","username = '$username'");
        if($check->num_rows == 1)
        {
            $number = random_int(1000,9999);
            $UPDATE = UPDATE($conn,"tb_members","reset_number = '$number'","username = '$username'");
            $mes = "หมายเลขรีเซ็ตรหัสผ่าน : ".$number;
    
            if($UPDATE)
            {
                alert("ส่งหมายเลขรีเซ็ตรหัสผ่านเรียบร้อยแล้ว!","forget_password.php?id=".$username);
            }
            else
            {
                alert("เกิดข้อผิดพลาดในการส่งหมายเลขรีเซ็ตรหัสผ่าน","forget.php");
            }
        }
        else
        {
            alert("ไม่พบชื่อผู้ใช้นี้","forget.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SUPERCARCARESHOP | เร็ว แรง</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
     html,body
    {
        background-color: #D3D3D3;
    }
    .breadcrumb{
        background-color: #D49B54;
        font-size: 16px;
    }
</style>
<body>
    

    <form action="" method="post">
    <div class="container">
        <div class="panel panel-warning" style="margin:0 auto;width: 500px; margin-top: 20px; margin-bottom: 20px;">
            <div class="breadcrumb text-center">กู้คืนรหัสผ่าน</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input type="email" name="username" placeholder="username@gmail.com" required class="form-control" id="username">
                </div>
                <input type="submit" onclick="return confirm('คุณต้องการที่จะกู้คืนรหัสผ่าน ?');" class="btn btn-success btn-block" name="login" value="ยืนยัน">
                <a href="login.php" class="btn btn-danger btn-block">กลับ</a>
            </div>
        </div>
    </div>
</form>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>