<?php
// Đảm bảo người dùng phải đăng nhập là admin
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="user/users_list.php">Quản lý người dùng</a></li>
                <li><a href="product/products_list.php">Quản lý sản phẩm</a></li>
                <li><a href="category/manage_categories.php">Quản lý loại sản phẩm</a></li>
                <li><a href="logout.php">Đăng xuất</a></li>
            </ul>
        </aside>
        <main class="content">
            <h1>Chào mừng đến trang quản trị</h1>
            <p>Chọn chức năng từ menu bên trái để bắt đầu.</p>
        </main>
    </div>
</body>
</html>
