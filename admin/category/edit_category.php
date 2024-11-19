<?php
// Kết nối đến database
include './config.php'; // Đảm bảo file này chứa code kết nối cơ sở dữ liệu

// Kiểm tra xem có nhận được ID của category hay không
if (!isset($_GET['id'])) {
    die("ID danh mục không tồn tại!");
}

$id = intval($_GET['id']); // Lấy ID từ URL và ép kiểu thành số nguyên

// Truy vấn lấy thông tin category hiện tại
$sql = "SELECT * FROM categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$category = $result->fetch_assoc();

if (!$category) {
    die("Không tìm thấy danh mục với ID này!");
}

// Xử lý cập nhật khi form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']); // Lấy giá trị từ form

    // Kiểm tra dữ liệu đầu vào
    if (empty($name)) {
        $error = "Tên danh mục không được để trống!";
    } else {
        // Cập nhật vào database
        $update_sql = "UPDATE categories SET name = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $name, $id);

        if ($update_stmt->execute()) {
            $success = "Cập nhật danh mục thành công!";
        } else {
            $error = "Lỗi khi cập nhật danh mục!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa danh mục</title>
</head>
<body>
    <h1>Chỉnh sửa danh mục</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="name">Tên danh mục:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($category['name']); ?>"><br><br>

        <button type="submit">Lưu thay đổi</button>
        <a href="categories_list.php">Quay lại danh sách</a>
    </form>
</body>
</html>
