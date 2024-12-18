<?php
session_start();
include './config.php';

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: dangnhap.php');
    exit();
}

// Kết nối cơ sở dữ liệu
$conn = connectDatabase();
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Kiểm tra và thay thế NULL bằng chuỗi rỗng
$username = isset($user['username']) ? htmlspecialchars($user['username']) : '';
$email = isset($user['email']) ? htmlspecialchars($user['email']) : '';
$phone = isset($user['phone']) ? htmlspecialchars($user['phone']) : '';
$address = isset($user['address']) ? htmlspecialchars($user['address']) : '';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Người Dùng</title>
    <link rel="stylesheet" href="./styles/thongtinuser.css">
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
    <div class="thongtin">
        <h2>Thông Tin Của Bạn</h2>
        <form id="userInfoForm" action="#" method="POST">
            <div class="form-group">
                <label for="name">Họ và Tên</label>
                <input type="text" id="name" name="name" value="<?php echo $username; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>">
            </div>
        </form>
        <form action="dangxuat.php" method="POST">
            <button type="submit" name="logout" class="logout-btn">Đăng Xuất</button>
        </form>
    </div>
</body>

</html>
