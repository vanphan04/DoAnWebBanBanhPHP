<?php
// Đọc các file cần thiết
include 'includes/header.php';
?>
<body onload="myFunction()"> 
    <div id="loader"></div>
    <div id="myDiv" style="display:none;">
        <div class="frm-main">
            <?php include 'includes/menu.php'; ?>
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
                            $slides = [
                                'images/slide.png',
                                'images/slide1.jpg',
                                'images/slide5.jpg',
                                'images/slide3.png',
                                'images/slide4.jpg',
                                'images/slide6.jpg',
                                'images/slide7.jpg',
                                'images/slide8.jpg',
                                'images/slide9.jpg',
                            ];
                            foreach ($slides as $slide) {
                                echo "<a href='#'><img src='$slide' alt='slide' class='image-item'></a>";
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
                        <p>Dù bạn là ai, chúng tôi mong rằng, bạn sẽ luôn tìm được chiếc bánh phù hợp với khẩu vị của riêng mình tại CakeShop.</p>
                        <p>Từ chiếc hộp, cây nến, tấm bưu thiệp hay cách chúng tôi trao tới bạn tận tay món quà ấy, đều sẽ được chuẩn bị thật chu đáo.</p>
                    </div>
                </div>
                <div class="monmoi">
                    <div class="main">
                        <h1>Sản Phẩm Mới</h1>
                    </div>
                    <div class="dsSP">
                        <?php
                        $products = [
                            ['img' => 'images/new1.jpg', 'name' => 'Soft Glow – Flan Gato Mè Đen Matcha', 'price' => '535.000'],
                            ['img' => 'images/new2.jpg', 'name' => 'Bold Charming – Flan Gato Trà Thái Đỏ', 'price' => '685.000'],
                            ['img' => 'images/new3.png', 'name' => 'My Muse – Entremet Ôlong Vải Hoa Hồng', 'price' => '735.000'],
                            ['img' => 'images/new4.jpg', 'name' => 'Delicate Bloom – Bánh Kem Bắp Dâu', 'price' => '465.000'],
                            ['img' => 'images/best1.png', 'name' => 'Flan Gato Strawberry – Flan Gato Dâu', 'price' => '465.000'],
                            ['img' => 'images/best2.png', 'name' => 'Tropical Vibes Mousse – Mousse Ổi hồng & Chanh dây', 'price' => '485.000'],
                            ['img' => 'images/best3.png', 'name' => 'Green Bliss – Mousse Bơ', 'price' => '535.000'],
                            ['img' => 'images/best4.png', 'name' => 'Sweet Box Cool Summer – Mùa Hè Thanh Mát (Xanh)', 'price' => '495.000'],
                        ];
                        foreach ($products as $product) {
                            echo "
                            <div>
                                <a href='#'>
                                    <img src='{$product['img']}' height='400' />
                                    <h2>{$product['name']}</h2>
                                    <p>{$product['price']}</p>
                                </a>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
</body>
</html>
