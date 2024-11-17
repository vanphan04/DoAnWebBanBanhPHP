<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : "The CakeShop"; ?></title>
    <link rel="stylesheet" href="styles/thanhtoan.css">
</head>
<body>
<?php
?>

<div class="phanchinh">
    <div class="hinhthuc">
        <p>HÌNH THỨC THANH TOÁN</p>
    </div>
    <div class="tienmat">
        <p id="tieude">THANH TOÁN KHI NHẬN HÀNG</p>
        <p id="ndTienMat">
            – Khách hàng có thể đặt hàng qua website thecake.com và nhân viên của chúng tôi sẽ gọi điện xác nhận về
            thông tin đơn hàng và tư vấn thêm thông tin.<br><br>
            – Quý Khách thanh toán đầy đủ toàn bộ giá trị đơn hàng cho nhân viên giao nhận ngay sau khi kiểm tra
            tình trạng đơn hàng (kiểm tra đúng sản phẩm đã đặt còn nguyên vẹn, đầy đủ phụ kiện đi kèm như dao nến và
            tag chúc mừng, … ).<br><br>
            – Nếu Quý Khách cần thay đổi hình thức thanh toán khi shipper đã giao hàng đến, hãy gọi Hotline
            0908.78.4566 để thông báo và được hỗ trợ nhanh chóng.
        </p>
    </div>
    <div class="chuyenkhoan">
        <div>
            <p id="tieude">THANH TOÁN CHUYỂN KHOẢN</p>
            <p id="ndCK">
                Quý khách hàng có thể thanh toán hoá đơn bằng cách chuyển khoản qua tài khoản của tiệm bánh The
                CakeShop
                với các ngân hàng dưới đây và liên hệ Hotline 0908.78.4530 để xác nhận thông tin.
            </p>
        </div>
        <div class="itemNganhang">
            <?php
            $banks = [
                [
                    'logo' => 'images/logo-Vietcombank.png',
                    'name' => 'Ngân hàng thương mại cổ phần Ngoại thương Việt Nam (Vietcombank)',
                    'owner' => 'Vũ Thị Hương Giang',
                    'account' => '4975.342.867.345',
                    'branch' => 'TP.Hồ Chí Minh',
                ],
                [
                    'logo' => 'images/acb.png',
                    'name' => 'Ngân hàng thương mại cổ phần Á Châu',
                    'owner' => 'Vũ Thị Hương Giang',
                    'account' => '4975.342.867.345',
                    'branch' => 'TP.Hồ Chí Minh',
                ],
                [
                    'logo' => 'images/sacombank.png',
                    'name' => 'Ngân hàng thương mại cổ phần Sài Gòn Thương Tín',
                    'owner' => 'Vũ Thị Hương Giang',
                    'account' => '4975.342.867.345',
                    'branch' => 'TP.Hồ Chí Minh',
                ],
            ];

            foreach ($banks as $bank): ?>
                <div class="nganhang">
                    <img src="<?php echo $bank['logo']; ?>" alt="">
                    <p>
                        <?php echo $bank['name']; ?>
                        <li>Chủ tài khoản: <b><?php echo $bank['owner']; ?></b></li>
                        <li>Số tài khoản: <b><?php echo $bank['account']; ?></b></li>
                        <li>Chi Nhánh: <?php echo $bank['branch']; ?></li>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

