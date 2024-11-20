<?php
session_start();
require('config.php'); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng chưa đăng nhập
?> 
<div style="min-height: 500px; display: flex; justify-content: center; align-items: center; text-align: center;">
    <?php 
    if (!isset($_SESSION['user_id'])) {
        die('Bạn phải đăng nhập để xem giỏ hàng.');
    }
    ?>
</div>
<?php
$user_id = $_SESSION['user_id']; // Lấy user_id từ session

// Kết nối cơ sở dữ liệu
$conn = connectDatabase();

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_POST['action']) && $_POST['action'] === 'remove') {
    $cart_id = $_POST['cart_id'] ?? null;

    if ($cart_id) {
        $delete_sql = "DELETE FROM cart WHERE id = :cart_id AND user_id = :user_id";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $delete_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $delete_stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không tồn tại.']);
    }
    exit;
}

// Xử lý cập nhật số lượng sản phẩm trong giỏ hàng
if (isset($_POST['action']) && $_POST['action'] === 'update') {
    $cart_id = $_POST['cart_id'] ?? null;
    $quantity = $_POST['quantity'] ?? 1;

    if ($cart_id && $quantity > 0) {
        $update_sql = "UPDATE cart SET quantity = :quantity WHERE id = :cart_id AND user_id = :user_id";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $update_stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $update_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $update_stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'Số lượng sản phẩm đã được cập nhật.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không tồn tại hoặc số lượng không hợp lệ.']);
    }
    exit;
}

// Lấy tất cả sản phẩm trong giỏ hàng
$sql = "SELECT c.id AS cart_id, p.name, p.price, c.quantity, (p.price * c.quantity) AS total
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tính tổng tiền
$total_price = 0;
foreach ($cart_items as $item) {
    $total_price += $item['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <script src="./scripts/giohang.js"></script>
    <link rel="stylesheet" href="./styles/giohang.css">
</head>
<body>
    <div class="main_content">
        <h2>Giỏ hàng của bạn</h2>
        <?php if (empty($cart_items)): ?>
            <p>Giỏ hàng hiện đang trống.</p>
        <?php else: ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo number_format($item['price'], 0, ',', '.'); ?> đ</td>
                            <td>
                                <input type="number" value="<?php echo $item['quantity']; ?>" 
                                       data-cart-id="<?php echo $item['cart_id']; ?>" 
                                       class="update-quantity" min="1">
                            </td>
                            <td><?php echo number_format($item['total'], 0, ',', '.'); ?> đ</td>
                            <td>
                                <button class="remove-item" data-cart-id="<?php echo $item['cart_id']; ?>">Xóa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Tổng cộng</td>
                        <td><?php echo number_format($total_price, 0, ',', '.'); ?> đ</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        <?php endif; ?>
    </div>
    </body>
</html>