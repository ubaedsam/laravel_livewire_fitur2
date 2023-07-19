try {
    // template ADMIN LTE
    window.$ = window.jQuery = require('jquery'); // JQuery
    require('admin-lte');
    require('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js'); // Admin Lte
    window.toastr = require('admin-lte/plugins/toastr/toastr.min.js'); // Library Toast JS
} catch (e) {}