<?php
include './config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_categories.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loại sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Thêm loại sản phẩm mới</h2>
    <form method="post">
        <div class="form-group">
            <label for="name">Tên loại sản phẩm:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="manage_categories.php" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
