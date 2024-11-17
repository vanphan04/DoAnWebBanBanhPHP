<?php
// Khai báo các biến để lưu dữ liệu và thông báo lỗi
$email = $password = "";
$error = "";

// Kiểm tra nếu biểu mẫu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra email và mật khẩu
    // (Ở đây chỉ kiểm tra một cách cơ bản, bạn sẽ thay thế bằng việc kiểm tra trong cơ sở dữ liệu)
    if ($email == "test@example.com" && $password == "123456") {
        // Nếu đăng nhập thành công, bạn có thể chuyển hướng người dùng hoặc thực hiện điều gì đó
        echo "Đăng nhập thành công!";
        // Ví dụ: header('Location: dashboard.php'); // Chuyển hướng đến trang quản trị
    } else {
        // Nếu đăng nhập thất bại, hiển thị thông báo lỗi
        $error = "Thông tin đăng nhập không đúng.";
// Khởi tạo biến lỗi
$emailError = $passwordError = "";
$email = $password = "";

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra email
    if (empty($email)) {
        $emailError = "Email là bắt buộc.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Vui lòng nhập địa chỉ email hợp lệ.";
    }

    // Kiểm tra mật khẩu
    if (empty($password)) {
        $passwordError = "Mật khẩu là bắt buộc.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./styles/dangnhap.css">
</head>
<body>


    <div class="login">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>Đăng Nhập</h1>
            <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" required> <br>
            <input type="password" name="password" placeholder="Mật khẩu" required><br>  
            <div>
                <a class="login-pass" href="#">Quên mật khẩu?</a>
            </div>
            <?php
                if ($error) {
                    echo '<p style="color: red;">' . $error . '</p>';
                }
            ?>
            <span class="-or"></span><span class="or">Or</span><span class="-or"></span> <br>
            <a class="loginn" href="#">Đăng Nhập </a><br>
            <div>
                <p>Bạn chưa có tài khoản<span><a href="./dangki.php" style="color: blue;"> Đăng ký</a></span></p> 
            </div>
        </form>
    </div>
</body>
</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="styles/dangnhap.css">
</head>

<body>
    <section class="checkout">
        <div class="container">
            <h4>Đăng nhập</h4>
            <form id="checkoutForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="row">
                    <div class="checkout__input">
                        <label for="emailInput">Email<span>*</span></label>
                        <input type="email" id="emailInput" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                        <div class="error-message"><?php echo $emailError; ?></div>
                    </div>
                    <div class="checkout__input">
                        <label for="matkhauInput">Mật khẩu<span>*</span></label>
                        <input type="password" id="matkhauInput" name="password" required>
                        <div class="error-message"><?php echo $passwordError; ?></div>
                    </div>
                </div>
                <div class="checkout__input__checkbox">
                    <label for="diff-acc">
                        <input type="checkbox" id="diff-acc">
                        Ghi nhớ mật khẩu
                        <span class="checkmark"></span>
                    </label>
                    <a href="#">Quên mật khẩu</a>
                </div>
                <div class="checkout__order">
                    <button type="submit" class="site-btn">Đăng nhập</button>
                    <p>Hoặc</p>
                    <button type="button" class="newcreat-btn">Tạo tài khoản mới</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
