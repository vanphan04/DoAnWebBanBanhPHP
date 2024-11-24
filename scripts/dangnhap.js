document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("checkoutForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      validateForm();
    });
});
function validateForm() {
  var email = document.getElementById("emailInput").value.trim();
  var matkhau = document.getElementById("matkhauInput").value.trim();
  var isValid = true;
  if (!validatePassword(matkhau)) {
    document.getElementById("matkhauErrorMessage").textContent =
      "Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.";
    isValid = false;
  } else {
    document.getElementById("matkhauErrorMessage").textContent = "";
  }
  if (!validateEmail(email)) {
    document.getElementById("emailErrorMessage").textContent =
      "Vui lòng nhập một địa chỉ email hợp lệ.";
    isValid = false;
  } else {
    document.getElementById("emailErrorMessage").textContent = "";
  }
  if (isValid) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "dangnhap.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        console.log("Response Text:", xhr.responseText);
        if (xhr.status === 200) {
          try {
            var response = JSON.parse(xhr.responseText);
            if (response.status === "success") {
              alert("Đăng nhập thành công!");
              window.location.href = "index.php";
            } else {
              document.getElementById("emailErrorMessage").textContent =
                response.message;
            }
          } catch (e) {
            console.error("JSON Parse Error:", e.message);
            console.log("Response was:", xhr.responseText);
          }
        } else {
          alert("HTTP Error: " + xhr.status);
        }
      }
    };
    var data = `email=${encodeURIComponent(
      email
    )}&password=${encodeURIComponent(matkhau)}`;
    xhr.send(data);
  }
  return false;
}
function dangki() {
  window.location.href = "index.php?page=dangki.php";
}
function validateEmail(email) {
  var emailRegex = /\S+@\S+\.\S+/;
  return emailRegex.test(email);
}
function validatePassword(password) {
  var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
  return passwordRegex.test(password);
}
    