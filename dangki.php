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
    <script src="scripts/dangki.js"></script>
    <link rel="stylesheet" href="./styles/dangki.css">
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
                <p>Bạn đã có tài khoản<span><a style="color: blue;" onclick="dangnhap()"> Đăng nhập</a></span></p> 
            </div>
        </form>
    </div>
</body>
</html>
