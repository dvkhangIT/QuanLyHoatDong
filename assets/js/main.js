// (function ($) {
//   "use strict";

//   var fullHeight = function () {
//     $(".js-fullheight").css("height", $(window).height());
//     $(window).resize(function () {
//       $(".js-fullheight").css("height", $(window).height());
//     });
//   };
//   fullHeight();

//   $("#sidebarCollapse").on("click", function () {
//     $("#sidebar").toggleClass("active");
//   });
// })(jQuery);
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
