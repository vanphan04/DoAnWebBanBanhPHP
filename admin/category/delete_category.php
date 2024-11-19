<?php
include './config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM categories WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_categories.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
