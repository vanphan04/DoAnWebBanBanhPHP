<?php
// Kết nối đến database
include './config.php';

// Xử lý thêm user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($password) || empty($email)) {
        $error = "Tên tài khoản, mật khẩu và email không được để trống!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ!";
    } else {
        // Chèn dữ liệu vào bảng `users`
        $sql = "INSERT INTO users (username, password, email, phone, address, role) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $username, $password, $email, $phone, $address, $role);

        if ($stmt->execute()) {
            $success = "Thêm người dùng thành công!";
        } else {
            $error = "Lỗi khi thêm người dùng!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>
<body>
    <h1>Thêm người dùng mới</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="username">Tên tài khoản:</label><br>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="phone">Số điện thoại:</label><br>
        <input type="text" id="phone" name="phone"><br><br>

        <label for="address">Địa chỉ:</label><br>
        <textarea id="address" name="address"></textarea><br><br>

        <label for="role">Vai trò:</label><br>
        <select id="role" name="role">
            <option value="customer">Khách hàng</option>
            <option value="admin">Quản trị viên</option>
        </select><br><br>

        <button type="submit">Thêm người dùng</button>
        <a href="users_list.php">Quay lại danh sách</a>
    </form>
</body>
</html>
