<?php
include './config.php';

if (!isset($_GET['id'])) {
    die("ID sản phẩm không tồn tại!");
}

$id = intval($_GET['id']);

// Xóa ảnh liên quan
$sql_image = "DELETE FROM product_images WHERE product_id = ?";
$stmt_image = $conn->prepare($sql_image);
$stmt_image->bind_param("i", $id);
$stmt_image->execute();

// Xóa sản phẩm
$sql = "DELETE FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: products_list.php?message=Xóa sản phẩm thành công!");
    exit();
} else {
    die("Lỗi khi xóa sản phẩm!");
}
?>
