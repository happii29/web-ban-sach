<?php
    session_start();
    include "admin/config/config.php";

    // Hàm kiểm tra tài khoản đã tồn tại trong CSDL
    function isAccountExists($email, $mysqli) {
        $query = "SELECT * FROM thanhvien WHERE email = '$email'";
        $result = $mysqli->query($query);
        return $result->num_rows > 0;
    }


    if(isset($_POST['dangky'])){
        $name = $_POST['hovaten'];
        $email = $_POST['email'];
        $phone = $_POST['dienthoai'];
        $password = md5($_POST['password']);
        if(empty($name) || empty($email) || empty($phone)||empty($password)){
            echo "Vui lòng điền đầy đủ thông tin.";
        } else {
            // Kiểm tra tài khoản đã tồn tại trong CSDL
            if (isAccountExists($email, $mysqli)) {
                echo "Tài khoản đã tồn tại trong CSDL.";
            } else {
                
                $sql_dangky = mysqli_query($mysqli,"INSERT INTO thanhvien(name,email,phone,password) VALUE('".$name."','".$email."','".$phone."','".$password."')");
                if($sql_dangky){
                    echo '<p style="color:green">Bạn đã đăng ký thành công !</p>';
                    $_SESSION['dangky'] = $name;
                    header('Location:dangnhap.php');
                }
            }
        }

       
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style type="text/css">
        body{
            background:#f2f2f2;
        }
        .wrapper-login {
            width: 15%;
            margin: 0 auto;
        }
        table.table-dangky {
            width:100%
        }
        table.table-login tr td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="wrapper-login">
        <form action="" autocomplete="off" method="POST">
           <table border="1" class="table-dangky" width="50%" style="text-align: center; border-collapse: collapse;">
                <tr>
                    <td colspan="2"><h3>Đăng ký Thành viên</h3></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" size="50" name="hovaten"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" size="50" name="email"></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><input type="text" size="50" name="dienthoai"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="text" size="50" name="password"></td>
                </tr>
                <tr>
                <td colspan="2"><input type="submit" name="dangky" value="Đăng ký"></td>
                </tr>
            </table> 
        </form>
        
    </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
