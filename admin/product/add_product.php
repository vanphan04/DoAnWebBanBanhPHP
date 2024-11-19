<?php
include './config.php';

// Xử lý thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);
    $stock = intval($_POST['stock']);
    $image = $_FILES['image'];

    // Kiểm tra dữ liệu đầu vào
    if (empty($name) || $price <= 0) {
        $error = "Tên sản phẩm và giá không được để trống hoặc không hợp lệ!";
    } else {
        // Thêm sản phẩm vào bảng `products`
        $sql = "INSERT INTO products (name, description, price, category_id, stock) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdii", $name, $description, $price, $category_id, $stock);

        if ($stmt->execute()) {
            $product_id = $stmt->insert_id;

            // Xử lý hình ảnh
            if ($image['error'] == UPLOAD_ERR_OK) {
                $image_name = 'uploads/' . basename($image['name']);
                move_uploaded_file($image['tmp_name'], $image_name);

                // Lưu đường dẫn ảnh vào bảng `product_images`
                $sql_image = "INSERT INTO product_images (product_id, image) VALUES (?, ?)";
                $stmt_image = $conn->prepare($sql_image);
                $stmt_image->bind_param("is", $product_id, $image_name);
                $stmt_image->execute();
            }

            $success = "Thêm sản phẩm thành công!";
        } else {
            $error = "Lỗi khi thêm sản phẩm!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Thêm sản phẩm mới</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="price">Giá:</label><br>
        <input type="number" id="price" name="price" step="0.01"><br><br>

        <label for="category_id">Danh mục:</label><br>
        <input type="number" id="category_id" name="category_id"><br><br>

        <label for="stock">Số lượng trong kho:</label><br>
        <input type="number" id="stock" name="stock"><br><br>

        <label for="image">Hình ảnh:</label><br>
        <input type="file" id="image" name="image"><br><br>

        <button type="submit">Thêm sản phẩm</button>
        <a href="products_list.php">Quay lại danh sách</a>
    </form>
</body>
</html>
