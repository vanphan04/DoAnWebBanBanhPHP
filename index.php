<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Shop</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="scripts/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="scripts/dangnhap.js"></script>
    <script src="scripts/giaohang.js"></script>
    <script src="scripts/slide.js" defer></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body onload="myFunction()"> 
    <div id="loader"></div>
    <div id="myDiv" style="display:none;">
        <div class="frm-main">
            <header class="header">
                <div class="main_header">
                    <div class="header_logo">
                        <img src="images/logo.png" alt="">
                    </div>
                    <div class="header_menu">
                        <div class="icon-bar" onclick="toggleMenu()">
                            <i class="fa fa-bars"></i>
                        </div>
                        <ul class="mainmenu">
                            <li>
                                <a href="index.php" id="home-link">TRANG CHỦ</a>
                            </li>
                            <div class="menubanh">
                                <div><a href="#">MENU BÁNH</a></div>
                                <span class="menu_danhsach"></span>
                                <ul>
                                    <li><a href="#">Sweet Box</a></li>
                                    <li><a href="#">Bánh Mousse</a></li>
                                    <li><a href="#">Bánh Etremet</a></li>
                                    <li><a href="#">Bánh Kem Bắp</a></li>
                                    <li><a href="#">Bánh Flan Gato</a></li>
                                    <li><a href="#">Combo Bánh Nướng</a></li>
                                </ul>
                            </div>
                            <li><a href="dangnhap.php">ĐĂNG NHẬP</a></li>
                            <li><a href="thanhtoan.php">THANH TOÁN</a></li>
                            <li><a href="giaohang.php">GIAO HÀNG</a></li>
                            <li><a href="tintuc.php">TIN TỨC</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="main_content">
                <div class="banner">
                    <img src="images/background2.png" alt="">
                    <div class="banner-text">
                        <h1>Bánh ngon tiệc vui</h1>
                        <h2>Đón hè rực rỡ</h2>
                    </div>
                </div>
                <div class="mainslider">
                    <div class="slider-wrapper">
                        <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
                        <div class="image-list">
                            <a href="#"><img src="images/slide.png" alt="img-1" class="image-item"></a>
                            <a href="banh.php"><img src="images/slide1.jpg" alt="img-2" class="image-item"></a>
                            <a href="#"><img src="images/slide5.jpg" alt="img-3" class="image-item"></a>
                            <a href="#"><img src="images/slide3.png" alt="img-4" class="image-item"></a>
                            <a href="#"><img src="images/slide4.jpg" alt="img-5" class="image-item"></a>
                            <a href="#"><img src="images/slide6.jpg" alt="img-6" class="image-item"></a>
                            <a href="#"><img src="images/slide7.jpg" alt="img-7" class="image-item"></a>
                            <a href="#"><img src="images/slide8.jpg" alt="img-8" class="image-item"></a>
                            <a href="#"><img src="images/slide9.jpg" alt="img-9" class="image-item"></a>
                        </div>
                        <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
                    </div>
                    <div class="slider-scrollbar">
                        <div class="scrollbar-track">
                            <div class="scrollbar-thumb"></div>
                        </div>
                    </div>
                </div>
                <div class="gioithieu_main">
                    <div>
                        <img src="images/gioithieu.png" alt="">
                    </div>
                    <div class="text">
                        <h3>Không chỉ là chiếc bánh, mà là một món quà</h3>
                        <p>Dù bạn là ai, chúng tôi mong rằng, bạn sẽ luôn tìm được chiếc bánh phù hợp với khẩu vị của
                            riêng mình tại CakeShop.</p>
                        <p>Từ chiếc hộp, cây nến, tấm bưu thiệp hay cách chúng tôi trao tới bạn tận tay món quà ấy, đều
                            sẽ
                            được chuẩn bị thật chu đáo.</p>
                    </div>
                </div>
                <div class="monmoi">
                    <div class="main">
                        <h1>Sản Phẩm Mới</h1>
                    </div>
                    <div class="dsSP">
                        <?php
                        // Dữ liệu sản phẩm (sử dụng cơ sở dữ liệu hoặc mảng giả lập)
                        $products = [
                            ["Soft Glow – Flan Gato Mè Đen Matcha", "images/new1.jpg", "535.000"],
                            ["Bold Charming – Flan Gato Trà Thái Đỏ", "images/new2.jpg", "685.000"],
                            ["My Muse – Entremet Ôlong Vải Hoa Hồng", "images/new3.png", "735.000"],
                            ["Delicate Bloom – Bánh Kem Bắp Dâu", "images/new4.jpg", "465.000"],
                            ["Flan Gato Strawberry – Flan Gato Dâu", "images/best1.png", "465.000"],
                            ["Tropical Vibes Mousse – Mousse Ổi hồng & Chanh dây", "images/best2.png", "485.000"],
                            ["Green Bliss – Mousse Bơ", "images/best3.png", "535.000"],
                            ["Sweet Box Cool Summer – Mùa Hè Thanh Mát (Xanh)", "images/best4.png", "495.000"]
                        ];

                        // Hiển thị sản phẩm
                        foreach ($products as $product) {
                            echo '<div>
                                    <a href="#">
                                        <img src="'.$product[1].'" height="400" />
                                        <h2>'.$product[0].'</h2>
                                        <p>'.$product[2].'</p>
                                    </a>
                                  </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="frm-ft">
            <footer class="footer">
                <div class="ft-up">
                    <p>Công ty TNHH Cake Shop</p>
                    <p>Địa chỉ: 180 Cao Lỗ, Phường 4, Quận 8, Thành phố Hồ Chí Minh</p>
                    <p>Số điện thoại: 098.5344.133</p>
                    <p>Email: contact@cakeshop.com</p>
                    <p>Giấy chứng nhận đăng ký kinh doanh: 646466533</p>
                    <p>Mã số doanh nghiệp: 253454535355. Giấy chứng nhận đăng ký doanh nghiệp do Sở Kế hoạch và Đầu tư
                        Thành phố Hồ Chí Minh cấp ngày 1 tháng 1 năm 2010.</p>
                    <div>
                        <a href="#"><img src="images/facebook.svg" alt="facebook"></a>
                        <a href="#"><img src="images/instagram.svg" alt="instagram"></a>
                        <a href="#"><img src="images/youtube.svg" alt="youtube"></a>
                    </div>
                </div>
                <div class="ft-down">
                    <a href="tintuc.php">Tin Tức</a>
                    <a href="hoidap.php">Hỏi Đáp</a>
                    <a href="chamsockhachhang.php">Chăm Sóc Khách Hàng</a>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
