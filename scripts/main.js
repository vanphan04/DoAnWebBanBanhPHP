var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000); // Tạo độ trễ 3 giây
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}

window.addEventListener("load", () => {
    clearTimeout(myVar); // Xóa bộ hẹn giờ nếu trang tải trước khi hết 3 giây
    showPage(); // Hiển thị nội dung trang ngay lập tức
});

function toggleMenu() {
    var menu = document.querySelector('.mainmenu');/*Lấy phần tử menu.*/
    menu.classList.toggle('active'); /*Thêm hoặc xóa lớp "active" khỏi phần tử menu, khiến cho menu mở hoặc đóng.*/
}


function loadContent(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            var content = xhr.responseText;
            var mainContentElement = document.querySelector('.main_content');
            if (mainContentElement) {
                mainContentElement.innerHTML = content;
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
/*Các hàm này được sử dụng để tải nội dung từ các tệp HTML khác vào phần tử có lớp "main_content" của trang.*/

function loadNewsContent() {
    var xhr = new XMLHttpRequest();/*Tạo một đối tượng XMLHttpRequest để gửi yêu cầu HTTP đến máy chủ.*/

    // Mở yêu cầu GET đến tệp "tintuc.html"
    /*Mở một yêu cầu HTTP với phương thức GET đến một URL cụ thể. Tham số thứ ba là một boolean, đặt là true để yêu cầu được gửi bất đồng bộ.*/
    xhr.open('GET', 'tintuc.php', true);

    // Xử lý sự kiện khi yêu cầu được gửi và nhận được phản hồi
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {//Kiểm tra xem phản hồi có mã trạng thái nằm trong khoảng thành công không.
            // Lấy nội dung của tintuc.html từ phản hồi
            var newsContent = xhr.responseText;//Lấy nội dung của phản hồi từ máy chủ.

            // Thay thế nội dung của phần tử có lớp "main_content" bằng nội dung mới
            var mainContentElement = document.querySelector('.main_content');//Lấy phần tử trong DOM có lớp "main_content".
            if (mainContentElement) {
                mainContentElement.innerHTML = newsContent;// Thay đổi nội dung của phần tử "main_content" bằng nội dung mới từ phản hồi.
            } else {
                console.error('Không tìm thấy phần tử có lớp "main_content"');
            }
        } else {
            console.error('Không thể tải tintuc.php');
        }
    };

    // Xử lý lỗi khi không thể gửi yêu cầu
    xhr.onerror = function () {
        console.error('Lỗi kết nối');
    };

    // Gửi yêu cầu
    xhr.send();
}


function loadContentThanhToan() {
    var xhr = new XMLHttpRequest();

    // Mở yêu cầu GET đến tệp "tintuc.html"
    xhr.open('GET', 'thanhtoan.php', true);

    // Xử lý sự kiện khi yêu cầu được gửi và nhận được phản hồi
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Lấy nội dung của tintuc.html từ phản hồi
            var newsContent = xhr.responseText;

            // Thay thế nội dung của phần tử có lớp "main_content" bằng nội dung mới
            var mainContentElement = document.querySelector('.main_content');
            if (mainContentElement) {
                mainContentElement.innerHTML = newsContent;
            } else {
                console.error('Không tìm thấy phần tử có lớp "main_content"');
            }
        } else {
            console.error('Không thể tải thanhtoan.php');
        }
    };

    // Xử lý lỗi khi không thể gửi yêu cầu
    xhr.onerror = function () {
        console.error('Lỗi kết nối');
    };

    // Gửi yêu cầu
    xhr.send();
}
function loadContentDangNhap() {
    var xhr = new XMLHttpRequest();

    // Mở yêu cầu GET đến tệp "tintuc.html"
    xhr.open('GET', 'dangnhap.php', true);

    // Xử lý sự kiện khi yêu cầu được gửi và nhận được phản hồi
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Lấy nội dung của tintuc.html từ phản hồi
            var newsContent = xhr.responseText;

            // Thay thế nội dung của phần tử có lớp "main_content" bằng nội dung mới
            var mainContentElement = document.querySelector('.main_content');
            if (mainContentElement) {
                mainContentElement.innerHTML = newsContent;
            } else {
                console.error('Không tìm thấy phần tử có lớp "main_content"');
            }
        } else {
            console.error('Không thể tải dangnhap.php');
        }
    };

    // Xử lý lỗi khi không thể gửi yêu cầu
    xhr.onerror = function () {
        console.error('Lỗi kết nối');
    };

    // Gửi yêu cầu
    xhr.send();
}
function loadContentGiaoHang() {
    var xhr = new XMLHttpRequest();

    // Mở yêu cầu GET đến tệp "tintuc.html"
    xhr.open('GET', 'giaohang.php', true);

    // Xử lý sự kiện khi yêu cầu được gửi và nhận được phản hồi
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Lấy nội dung của tintuc.html từ phản hồi
            var newsContent = xhr.responseText;

            // Thay thế nội dung của phần tử có lớp "main_content" bằng nội dung mới
            var mainContentElement = document.querySelector('.main_content');
            if (mainContentElement) {
                mainContentElement.innerHTML = newsContent;
            } else {
                console.error('Không tìm thấy phần tử có lớp "main_content"');
            }
        } else {
            console.error('Không thể tải giaohang.php');
        }
    };

    // Xử lý lỗi khi không thể gửi yêu cầu
    xhr.onerror = function () {
        console.error('Lỗi kết nối');
    };

    // Gửi yêu cầu
    xhr.send();
}
function loadContentBanh() {
    var xhr = new XMLHttpRequest();

    // Mở yêu cầu GET đến tệp "tintuc.html"
    xhr.open('GET', 'banh.php', true);

    // Xử lý sự kiện khi yêu cầu được gửi và nhận được phản hồi
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Lấy nội dung của tintuc.html từ phản hồi
            var newsContent = xhr.responseText;

            // Thay thế nội dung của phần tử có lớp "main_content" bằng nội dung mới
            var mainContentElement = document.querySelector('.main_content');
            if (mainContentElement) {
                mainContentElement.innerHTML = newsContent;
            } else {
                console.error('Không tìm thấy phần tử có lớp "main_content"');
            }
        } else {
            console.error('Không thể tải banh.php');
        }
    };

    // Xử lý lỗi khi không thể gửi yêu cầu
    xhr.onerror = function () {
        console.error('Lỗi kết nối');
    };

    // Gửi yêu cầu
    xhr.send();
}



//một sự kiện được kích hoạt khi DOM của trang web đã được tải và phân tích hoàn toàn.
document.addEventListener("DOMContentLoaded", function () {
    var params = new URLSearchParams(window.location.search);
            var page = params.get('page');
            if (page) {
                loadContent(page);
            }
    // Gán sự kiện click cho liên kết "TIN TỨC"
    var tinTucLink1 = document.querySelector('a[href="tintuc.php"]');//Lấy thẻ a có thuộc tính href bằng "tintuc.html".
    if (tinTucLink1) {
        tinTucLink1.addEventListener('click', function (event) {//Gắn một sự kiện "click" vào liên kết này, để khi được nhấp vào, 
            //sẽ gọi hàm xử lý sự kiện được định nghĩa bên trong.

            // Ngăn chặn hành vi mặc định của liên kết, không điều hướng đến trang mới.
            event.preventDefault();

            // Gọi hàm loadNewsContent() khi người dùng click vào liên kết "TIN TỨC"
            //Gọi hàm tải nội dung mới tương ứng với liên kết đó.
            loadNewsContent();
        });
    }
    var tinTucLink2 = document.querySelector('a[href="thanhtoan.php"]');
    if (tinTucLink2) {
        tinTucLink2.addEventListener('click', function (event) {
            // Ngăn chặn hành vi mặc định của liên kết
            event.preventDefault();

            // Gọi hàm loadNewsContent() khi người dùng click vào liên kết "TIN TỨC"
            loadContentThanhToan();
        });
    }
    var tinTucLink3 = document.querySelector('a[href="dangnhap.php"]');
    if (tinTucLink3) {
        tinTucLink3.addEventListener('click', function (event) {
            // Ngăn chặn hành vi mặc định của liên kết
            event.preventDefault();

            // Gọi hàm loadNewsContent() khi người dùng click vào liên kết "TIN TỨC"
            loadContentDangNhap();
        });
    }
    var tinTucLink4 = document.querySelector('a[href="giaohang.php"]');
    if (tinTucLink4) {
        tinTucLink4.addEventListener('click', function (event) {
            // Ngăn chặn hành vi mặc định của liên kết
            event.preventDefault();

            // Gọi hàm loadNewsContent() khi người dùng click vào liên kết "TIN TỨC"
            loadContentGiaoHang();
        });
    }
    var tinTucLink5 = document.querySelector('a[href="banh.php"]');
    if (tinTucLink5) {
        tinTucLink5.addEventListener('click', function (event) {
            // Ngăn chặn hành vi mặc định của liên kết
            event.preventDefault();

            // Gọi hàm loadNewsContent() khi người dùng click vào liên kết "TIN TỨC"
            loadContentBanh();

        });
    }
});



