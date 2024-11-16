<?php
// Khai báo biến để chứa dữ liệu từ biểu mẫu (tuỳ chọn)
$name = $phone = $email = $password = "";

// Kiểm tra nếu biểu mẫu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Bạn có thể thêm các xử lý ở đây, như kiểm tra dữ liệu, mã hoá mật khẩu và lưu vào cơ sở dữ liệu
    // Ví dụ:
    // $password = password_hash($password, PASSWORD_DEFAULT);
    
    // Để kiểm tra, ta sẽ in ra các giá trị nhận được
    echo "Họ tên: " . $name . "<br>";
    echo "Số điện thoại: " . $phone . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Mật khẩu: " . $password . "<br>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/reset.css">
    <style>
        /* Các kiểu CSS của bạn vẫn giữ nguyên */
        .login {
            background-color: rgb(243, 240, 235);
            max-width: 500px;
            margin: auto;
            padding: 10px 10px;
            text-align: center;
            margin-top: 120px;
            border-radius: 3px;
            margin-bottom: 30px;
        }
        .login h1 {
            padding-bottom: 10px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 600;
        }
        .login input {
            display: inline-block;
            width: 450px;
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            border: 1px solid #777;
            margin-bottom: 15px;
            border-radius: 7px;
        }
        .login .submit {
            font-size: 15px;
            padding: 10px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 600;
            text-transform: uppercase;
            text-align: center;
        }
        .login .submit:hover {
            background-color: #4267b2;
            color: white;
        }
        .-or {
            display: inline-block;
            width: 42%;
            border-bottom: solid 1px #333;
            justify-content: center;
            align-items: center;
        }
        .or {
            color: #333;
            margin: 0 1px;
            font-size: 14px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        .login a {
            text-decoration: none;
        }
        .login .sighup {
            margin-top: 15px;
            display: inline-block;
            width: 450px;
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            border: 1px solid #777;
            margin-bottom: 5px;
            background-color: #52cfdf;
            color: white;
            font-size: 20px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-image: url(icons8-facebook.svg);
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: 3px;
        }
        .login .sighup:hover {
            background-color: aqua;
            color: red;
        }
        .login .face {
            margin-top: 15px;
            display: inline-block;
            width: 450px;
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            border: 1px solid #777;
            margin-bottom: 15px;
            background-color: #4267b2;
            color: white;
            font-size: 20px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-image: url(icons8-facebook.svg);
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: 3px;
        }
        .login .goog {
            display: inline-block;
            width: 450px;
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            border: 1px solid #777;
            margin-bottom: 15px;
            color: black;
            font-size: 20px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-image: url(icons8-google.svg);
            background-repeat: no-repeat;
            background-size: 35px;
            background-position: 3px;
        }
    </style>
</head>
<body>
    <div class="login">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>Đăng Ký</h1>
            <input type="text" name="name" placeholder="Nhập họ tên" value="<?php echo $name; ?>" required><br>
            <input type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $phone; ?>" required><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required><br>
            <input type="password" name="password" placeholder="Mật khẩu" required><br>  
            <a class="sighup" href="#">Đăng ký</a><br>
            <div>
                <p>Bạn đã có tài khoản<span><a href="./dangnhap.php" style="color: blue;"> Đăng nhập</a></span></p> 
            </div>
        </form>
    </div>
</body>
</html>
