<?php
include './config.php';

if (!isset($_GET['id'])) {
    die("ID người dùng không tồn tại!");
}

$id = intval($_GET['id']);

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: users_list.php?message=Xóa người dùng thành công!");
    exit();
} else {
    die("Lỗi khi xóa người dùng!");
}
?>
