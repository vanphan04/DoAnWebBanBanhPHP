<?php
include './config.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý loại sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Quản lý loại sản phẩm</h2>
    <a href="add_category.php" class="btn btn-success mb-3">Thêm loại sản phẩm</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên loại</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td>
                    <a href="edit_category.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="delete_category.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
