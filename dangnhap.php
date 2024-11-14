<?php
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