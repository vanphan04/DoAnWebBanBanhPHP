<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Người Dùng</title>
    <link rel="stylesheet" href="./styles/thongtinuser.css">
</head>

<body>
    <div class="container">
        <h2>Thông Tin Của Bạn</h2>
        <form id="userInfoForm" action="update_user.php" method="POST">
            <div class="form-group">
                <label for="name">Họ và Tên</label>
                <input type="text" id="name" name="name" value="" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="" require>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại</label>
                <input type="text" id="phone" name="phone" value="">
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ</label>
                <input type="text" id="address" name="address" value="">
            </div>
            <button type="submit">Cập Nhật Thông Tin</button>
        </form>
    </div>
</body>

</html>
