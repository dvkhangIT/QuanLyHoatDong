function goBack() {
  window.history.back();
}
function printPage() {
  window.print();
}
window.onload = function () {
  document.body.style.opacity = 1;
};
// display image review
function previewImage(event) {
  var input = event.target;
  var preview = document.getElementById('image-preview');
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      // preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
}
document.getElementById('deleteIcon')?.addEventListener('click', function () {
  var preview = document.getElementById('image-preview');
  preview.src = 'images/img-upload.png';
  // preview.style.display = 'none';
  document.getElementById('hinhAnh').value = '';
});

// check password
function validatePassword() {
  const passwordInput = document.getElementById('inputPassword').value;
  let message = '';

  // Kiểm tra độ dài mật khẩu
  if (passwordInput.length < 8) {
    message = 'Mật khẩu phải có ít nhất 8 ký tự. ';
  }

  // Kiểm tra có chữ viết hoa không
  if (!/[A-Z]/.test(passwordInput)) {
    message = 'Mật khẩu phải có ít nhất một chữ cái viết hoa. ';
  }

  // Kiểm tra có chữ viết thường không
  if (!/[a-z]/.test(passwordInput)) {
    message = 'Mật khẩu phải có ít nhất một chữ cái viết thường. ';
  }

  // Kiểm tra có ký tự đặc biệt không
  if (!/[\W_]/.test(passwordInput)) {
    message = 'Mật khẩu phải có ít nhất một ký tự đặc biệt. ';
  }

  // Kiểm tra mật khẩu có hợp lệ không
  if (message === '') {
    document.getElementById('passwordMessage').innerHTML = '';
    document.getElementById('submitButton').disabled = false; // Kích hoạt nút submit
  } else {
    document.getElementById('passwordMessage').innerHTML = message;
    document.getElementById('submitButton').disabled = true; // Vô hiệu hóa nút submit
  }
}
