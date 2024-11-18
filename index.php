<!DOCTYPE html>
<html lang="en">

<?php 
require('includes/header.php'); 
require('config.php');
?>


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
                            <form action="timkiem.php" method="get" class="search-form" onsubmit="closeMenu()">
                                <input type="text" name="query" placeholder="Tìm kiếm..." required>
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </li>
                            <li>
                                <a href="index.php" id="home-link">TRANG CHỦ</a>
                            </li>
                            <div class="menubanh">
                                <div><a href="#" onclick="closeMenu()">MENU BÁNH</a></div>
                                <span class="menu_danhsach"></span>
                                <?php
                                    $conn = connectDatabase();

                                    // Truy vấn cơ sở dữ liệu để lấy danh sách các danh mục
                                    $sql = "SELECT id, name FROM categories";  // Truy vấn lấy tên và id các danh mục
                                    $result = $conn->query($sql);  // Thực hiện truy vấn

                                    // Kiểm tra nếu có danh mục trả về
                                    if ($result->rowCount() > 0) {
                                        // Duyệt qua từng danh mục và hiển thị trên giao diện
                                        echo '<ul>';
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<li><a onclick="closeMenu()" href="dsBanh.php?category_id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</a></li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        echo '<ul><li>Không có danh mục nào.</li></ul>';
                                    }
                                ?>
                            </div>
                            <li><a href="tintuc.php" onclick="closeMenu()">TIN TỨC</a></li>
                            <li>
                                <a href="giohang.php" onclick="closeMenu()" class="icon-link">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="dangnhap.php" onclick="closeMenu()" class="icon-link">
                                    <i class="fa fa-user"></i>
                                </a>
                            </li>

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
                        <?php
                                // Truy vấn lấy 9 ảnh ngẫu nhiên từ các sản phẩm khác nhau
                                $sql = "
                                    SELECT product_id, image
                                    FROM product_images
                                    GROUP BY product_id
                                    ORDER BY RAND()
                                    LIMIT 9
                                ";
                                $stmt = $conn->query($sql);

                                // Kiểm tra nếu có dữ liệu trả về
                                if ($stmt->rowCount() > 0) {
                                    // Duyệt qua các ảnh và hiển thị chúng
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        // Đảm bảo tên ảnh được thoát để tránh các vấn đề bảo mật
                                        $image_url = htmlspecialchars($row['image']);
                                        $product_id = $row['product_id'];  // Lấy product_id để sử dụng trong URL
                                        echo '<a href="banh.php?product_id=' . $product_id . '"><img src="' . $image_url . '" alt="product-image" class="image-item"></a>';
                                    }
                                } else {
                                    // Nếu không có ảnh nào
                                    echo '<p>No images available.</p>';
                                }
                            ?>
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
                            riêng mình tại VG Cake.</p>
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
                            // Truy vấn lấy 8 sản phẩm ngẫu nhiên từ bảng products và product_images
                            $sql = "SELECT p.id, p.name, pi.image, p.price 
                                    FROM products p
                                    JOIN product_images pi ON p.id = pi.product_id
                                    GROUP BY p.id
                                    ORDER BY RAND() 
                                    LIMIT 8";  // Lấy 8 sản phẩm ngẫu nhiên
                            $stmt = $conn->query($sql);

                            // Kiểm tra nếu có dữ liệu trả về
                            if ($stmt->rowCount() > 0) {
                                // Duyệt qua các sản phẩm và hiển thị chúng
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    // Đảm bảo tên ảnh được thoát để tránh các vấn đề bảo mật
                                    $image_url = htmlspecialchars($row['image']);
                                    $product_name = htmlspecialchars($row['name']);
                                    $product_price = number_format($row['price'], 0, ',', '.');  // Định dạng giá thành tiền
                                    $product_id = $row['id'];  // Lấy product_id

                                    echo '<div>
                                            <a href="banh.php?product_id=' . $product_id . '">
                                                <img src="' . $image_url . '" height="400" />
                                                <h2>' . $product_name . '</h2>
                                                <p>' . $product_price ." đ". '</p>
                                            </a>
                                        </div>';
                                }
                            } else {
                                // Nếu không có sản phẩm nào
                                echo '<p>No products available.</p>';
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
                        Thành
                        phố Hồ Chí Minh cấp lần đầu ngày 16/04/2019.</p>
                </div>
                <div class="ft-down">
                    Copyright&copy; Vũ Thị Hương Giang<br /> MSSV: DH52110848<br /> Lớp: D21_TH11
                </div>
                <div class="action-buttons">
                    <a href="tel:0985344133" class="contact-link phone-icon" id="tel">
                        <i class="fas fa-phone"></i>
                        <span class="phone-number">0985 344 133</span>
                    </a>
                    <a href="https://m.me/yourfacebookpage" class="contact-link fb-messenger-icon">
                        <i class="fa-brands fa-facebook-messenger"></i>
                    </a>
                    <a href="https://zalo.me/0985344133" class="contact-link zalo-icon">
                        <div class="animated_zalo infinite pulse_zalo cmoz-alo-circle-fill" id="div"></div>
                        <img src="images/Icon_of_Zalo.svg.png" alt="Zalo">

                    </a>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
