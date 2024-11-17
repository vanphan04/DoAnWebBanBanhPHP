function validateForm() {
    var email = emailInput.value.trim();
    var matkhau = matkhauInput.value.trim();
    var isValid = true;
    if (!validatePassword(matkhau)) {
        matkhauErrorMessage.textContent = 'Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.';
        isValid = false;
    } else {
        matkhauErrorMessage.textContent = '';
    }
    if (!validateEmail(email)) {
        emailErrorMessage.textContent = 'Vui lòng nhập một địa chỉ email hợp lệ.';
        isValid = false;
    } else {
        emailErrorMessage.textContent = '';
    }
    if (isValid) {
        alert('Đăng nhập thành công!');
        window.location.href = 'index.php';
    }
}
function dangki(){
    window.location.href = "index.php?page=dangki.php";
}

function validateEmail(email) {
    var emailRegex = /\S+@\S+\.\S+/;
    return emailRegex.test(email);
}
function validatePassword(password) {
//     Ít nhất một chữ cái thường (a-z).
//      Ít nhất một chữ cái hoa (A-Z).
//      Ít nhất một chữ số (0-9).
//      Ít nhất một ký tự đặc biệt hoặc dấu gạch dưới.
//      Độ dài ít nhất là 8 ký tự.
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    return passwordRegex.test(password);
}
//      ^: Ký tự này đại diện cho bắt đầu của chuỗi.

//      (?=.*[a-z]): Đây là một "positive lookahead" yêu cầu chuỗi phải có ít nhất một chữ cái thường (a-z).

//      (?=...): "Positive lookahead", đảm bảo rằng chuỗi chứa một mẫu cụ thể phía trước mà không thực sự tiêu thụ bất kỳ ký tự nào.
//      [a-z]: Bộ ký tự chứa các chữ cái thường.
//      (?=.*[A-Z]): Đây là một "positive lookahead" yêu cầu chuỗi phải có ít nhất một chữ cái hoa (A-Z).

//      [A-Z]: Bộ ký tự chứa các chữ cái hoa.
//      (?=.*\d): Đây là một "positive lookahead" yêu cầu chuỗi phải có ít nhất một chữ số (0-9).

//      \d: Ký tự đại diện cho một chữ số.
//      (?=.*[\W_]): Đây là một "positive lookahead" yêu cầu chuỗi phải có ít nhất một ký tự đặc biệt (không phải chữ cái hoặc số) hoặc dấu gạch dưới (_).

//      [\W_]: Bộ ký tự chứa bất kỳ ký tự nào không phải là chữ cái hoặc số và bao gồm dấu gạch dưới.
//      \W: Ký tự đại diện cho bất kỳ ký tự nào không phải chữ cái hoặc số.
//      .{8,}: Chuỗi phải có ít nhất 8 ký tự.

//      .: Ký tự đại diện cho bất kỳ ký tự nào.
//       {8,}: Yêu cầu ít nhất 8 ký tự.
//       $: Ký tự này đại diện cho kết thúc của chuỗi.