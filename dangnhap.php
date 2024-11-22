<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="styles/dangnhap.css">
</head>

<body>
    <section class="checkout">
        <div class="container">
            <h4>Đăng nhập</h4>
            <form id="checkoutForm" action="#">
                <div class="row">
                    <div class="checkout__input">
                        <p>Email<span>*</span></p>
                        <input type="text" id="emailInput">
                        <div class="error-message" id="emailErrorMessage"></div>
                    </div>
                    <div class="checkout__input">
                        <p>Mật khẩu<span>*</span></p>
                        <input type="password" id="matkhauInput">
                        <div class="error-message" id="matkhauErrorMessage"></div>
                    </div>
                </div>
                <div class="checkout__input__checkbox">
                    <label for="diff-acc">
                        <input type="checkbox" id="diff-acc">
                        Ghi nhớ mật khẩu
                        <span class="checkmark"></span>
                    </label>
                    <a href="#">Quên mật khẩu</a>
                </div>
                <div class="checkout__order">
                    <button type="button" class="site-btn" onclick="validateForm()">Đăng nhập</button>
                    <p>or</p>
                    <button type="button" class="newcreat-btn">Create an account</button>
                </div>
            </form>
        </div>
    </section>
    
</body>

</html>