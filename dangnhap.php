<?php include './config.php';
header('Content-Type: application/json; charset=utf-8');
error_reporting(0);
ini_set('display_errors', 0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $conn = connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        echo json_encode(['status' => 'success', 'message' => 'Đăng nhập thành công.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email hoặc mật khẩu không chính xác.']);
    }
    exit;
} ?>


<!DOCTYPE html>
<html lang="en">

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
            <form id="checkoutForm" action="#" method="post" onsubmit="return validateForm()">
                <div class="row">
                    <div class="checkout__input">
                        <p>Email<span>*</span></p> <input type="text" id="emailInput" name="email">
                        <div class="error-message" id="emailErrorMessage"></div>
                    </div>
                    <div class="checkout__input">
                        <p>Mật khẩu<span>*</span></p> <input type="password" id="matkhauInput" name="password">
                        <div class="error-message" id="matkhauErrorMessage"></div>
                    </div>
                </div>
                <div class="checkout__input__checkbox"> <label for="diff-acc"> <input type="checkbox" id="diff-acc"> Ghi nhớ mật khẩu <span class="checkmark"></span> </label> <a href="#">Quên mật khẩu</a> </div>
                <div class="checkout__order"> <button type="submit" class="site-btn">Đăng nhập</button>
                    <p>or</p> <button type="button" class="newcreat-btn" onclick="dangki()">Create an account</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>