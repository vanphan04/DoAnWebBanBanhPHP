<?php
include './config.php';

if (!isset($_GET['id'])) {
    die("ID người dùng không tồn tại!");
}

$id = intval($_GET['id']);

// Truy vấn lấy thông tin user
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Người dùng không tồn tại!");
}

// Xử lý cập nhật
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);

    // Kiểm tra dữ liệu
    if (empty($username) || empty($email)) {
        $error = "Tên tài khoản và email không được để trống!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ!";
    } else {
        // Cập nhật thông tin user
        $sql_update = "UPDATE users SET username = ?, email = ?, phone = ?, address = ?, role = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssssi", $username, $email, $phone, $address, $role, $id);

        if ($stmt_update->execute()) {
            $success = "Cập nhật người dùng thành công!";
        } else {
            $error = "Lỗi khi cập nhật!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa người dùng</title>
</head>
<body>
    <h1>Chỉnh sửa người dùng</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="username">Tên tài khoản:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br><br>

        <label for="phone">Số điện thoại:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"><br><br>

        <label for="address">Địa chỉ:</label><br>
        <textarea id="address" name="address"><?php echo htmlspecialchars($user['address']); ?></textarea><br><br>

        <label for="role">Vai trò:</label><br>
        <select id="role" name="role">
            <option value="customer" <?php if ($user['role'] == 'customer') echo 'selected'; ?>>Khách hàng</option>
            <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Quản trị viên</option>
        </select><br><br>

        <button type="submit">Lưu thay đổi</button>
        <a href="users_list.php">Quay lại danh sách</a>
    </form>
</body>
</html>
