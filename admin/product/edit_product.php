<?php
include './config.php';

if (!isset($_GET['id'])) {
    die("ID sản phẩm không tồn tại!");
}

$id = intval($_GET['id']);

// Lấy thông tin sản phẩm
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    die("Sản phẩm không tồn tại!");
}

// Xử lý cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);
    $stock = intval($_POST['stock']);
    $image = $_FILES['image'];

    // Cập nhật thông tin sản phẩm
    $sql_update = "UPDATE products SET name = ?, description = ?, price = ?, category_id = ?, stock = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssdiii", $name, $description, $price, $category_id, $stock, $id);

    if ($stmt_update->execute()) {
        // Xử lý cập nhật hình ảnh
        if ($image['error'] == UPLOAD_ERR_OK) {
            $image_name = 'uploads/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $image_name);

            // Cập nhật hoặc thêm hình ảnh mới
            $sql_image = "REPLACE INTO product_images (product_id, image) VALUES (?, ?)";
            $stmt_image = $conn->prepare($sql_image);
            $stmt_image->bind_param("is", $id, $image_name);
            $stmt_image->execute();
        }

        $success = "Cập nhật sản phẩm thành công!";
    } else {
        $error = "Lỗi khi cập nhật sản phẩm!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
</head>
<body>
    <h1>Chỉnh sửa sản phẩm</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>"><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description"><?php echo htmlspecialchars($product['description']); ?></textarea><br><br>

        <label for="price">Giá:</label><br>
        <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" step="0.01"><br><br>

        <label for="category_id">Danh mục:</label><br>
        <input type="number" id="category_id" name="category_id" value="<?php echo $product['category_id']; ?>"><br><br>

        <label for="stock">Số lượng trong kho:</label><br>
        <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>"><br><br>

        <label for="image">Hình ảnh:</label><br>
        <input type="file" id="image" name="image"><br><br>

        <button type="submit">Lưu thay đổi</button>
        <a href="products_list.php">Quay lại danh sách</a>
    </form>
</body>
</html>
