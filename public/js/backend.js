/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/backend.js ***!
  \*********************************/
// {{--  Untuk halaman appointment select option (tambah)  --}}

//   $(function () {
//     $('.select2').select2({
//       theme: 'bootstrap4',
//     }).on('change', function(){
//       @this.set('state.members', $(this).val());
//     });
//   })

// {{--  Untuk halaman user  --}}

// untuk alert pesan
$(document).ready(function () {
  // Alert
  toastr.options = {
    "positionClass": "toast-bottom-right",
    "progressBar": true
  };

  // Box Modal
  window.addEventListener('hide-form', function (event) {
    $('#form').modal('hide');
    toastr.success(event.detail.message, 'Success!');
  });
});

// CRUD Box Modal
window.addEventListener('show-form', function (event) {
  $('#form').modal('show');
});
window.addEventListener('show-delete-modal', function (event) {
  $('#confirmationModal').modal('show');
});
window.addEventListener('hide-delete-modal', function (event) {
  $('#confirmationModal').modal('hide');
  toastr.success(event.detail.message, 'Success!');
});
window.addEventListener('alert', function (event) {
  toastr.success(event.detail.message, 'Success!');
});
window.addEventListener('updated', function (event) {
  toastr.success(event.detail.message, 'Success!');
});

// Untuk akses profile di navbar
$('[x-ref="profileLink"]').on('click', function () {
  localStorage.setItem('_x_currentTab', '"profile"');
});
$('[x-ref="changePasswordLink"]').on('click', function () {
  localStorage.setItem('_x_currentTab', '"changePassword"');
});
/******/ })()
;