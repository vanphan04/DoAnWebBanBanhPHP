var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000); // Tạo độ trễ 3 giây
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}

function scrollToTop() {
    window.scrollTo({
        top: 0, 
        behavior: 'smooth' // Cuộn mượt
    });
}

window.addEventListener("load", () => {
    clearTimeout(myVar); // Xóa bộ hẹn giờ nếu trang tải trước khi hết 3 giây
    showPage(); // Hiển thị nội dung trang ngay lập tức
});

function toggleMenu() {
    var menu = document.querySelector('.mainmenu'); /* Lấy phần tử menu */
    menu.classList.toggle('active'); /* Thêm hoặc xóa lớp "active" khỏi phần tử menu */
}

function closeMenu() {
    const menu = document.querySelector('.mainmenu');
    menu.classList.remove('active');
}

function loadContentGeneric(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            var content = xhr.responseText;
            var mainContentElement = document.querySelector('.main_content');
            if (mainContentElement) {
                mainContentElement.innerHTML = content;
                scrollToTop();
            } else {
                console.error('Không tìm thấy phần tử có lớp "main_content"');
            }
        } else {
            console.error('Không thể tải ' + url);
        }
    };

    xhr.onerror = function () {
        console.error('Lỗi kết nối');
    };

    xhr.send();
}

document.addEventListener("DOMContentLoaded", function () {
    var params = new URLSearchParams(window.location.search);
    var page = params.get('page');
    if (page) {
        loadContentGeneric(page);
         // Sửa thành hàm đúng
         scrollToTop();
    }

    var tinTucLink1 = document.querySelector('a[href="tintuc.php"]');
    if (tinTucLink1) {
        tinTucLink1.addEventListener('click', function (event) {
            event.preventDefault();
            loadContentGeneric('tintuc.php'); // Sửa thành chuỗi đúng
            scrollToTop();
        });
    }

    var tinTucLink3 = document.querySelector('a[href="dangnhap.php"]');
    if (tinTucLink3) {
        tinTucLink3.addEventListener('click', function (event) {
            event.preventDefault();
            loadContentGeneric('dangnhap.php'); // Sửa thành chuỗi đúng
            scrollToTop();
        });
    }

    var tinTucLink4 = document.querySelector('a[href="giaohang.php"]');
    if (tinTucLink4) {
        tinTucLink4.addEventListener('click', function (event) {
            event.preventDefault();
            loadContentGeneric('giaohang.php'); // Sửa thành chuỗi đúng
            scrollToTop();
        });
    }

    var productLinks = document.querySelectorAll('a[href^="banh.php?product_id="]');
    productLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Ngừng tải trang thông thường
            var productId = new URL(link.href).searchParams.get('product_id'); // Lấy product_id từ URL
            loadContentGeneric('banh.php?product_id=' + productId); // Gọi trang banh.php với product_id
            scrollToTop(); // Cuộn lên đầu trang
        });
    });

    var dsBanhlink = document.querySelectorAll('a[href^="dsBanh.php?category_id="]');
    dsBanhlink.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var cateId = new URL(link.href).searchParams.get('category_id');
            loadContentGeneric('dsBanh.php?category_id=' + cateId); // Sửa thành URL đầy đủ
            scrollToTop();
        });
    });
    const searchForm = document.querySelector('#search-form'); // Form tìm kiếm
    const searchInput = document.querySelector('#search-input'); // Input tìm kiếm

    if (searchForm && searchInput) {
        searchForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn gửi form theo cách thông thường
            const query = searchInput.value.trim();
            if (query) {
                loadContentGeneric('timkiem.php?query=' + encodeURIComponent(query)); 
                scrollToTop();
            }
        });
    }
    var gioHangLink = document.querySelector('a[href="giohang.php"]');
    if (gioHangLink) {
        gioHangLink.addEventListener('click', function (event) {
            event.preventDefault(); // Ngừng tải trang theo cách thông thường
            loadContentGeneric('giohang.php'); // Gọi trang giohang.php
            scrollToTop(); // Cuộn lên đầu trang
        });
    }
    var linkThongtin = document.querySelector('a[href="thongtinuser.php"]');
    if (linkThongtin) {
        linkThongtin.addEventListener('click', function (event) {
            event.preventDefault(); // Ngừng tải trang theo cách thông thường
            loadContentGeneric('thongtinuser.php'); // Gọi trang giohang.php
            scrollToTop(); // Cuộn lên đầu trang
        });
    }

});
