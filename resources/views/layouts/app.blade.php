<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ setting('site_title') }} | {{ setting('site_name') }}</title>

  <link rel="stylesheet" href="/css/app.css">

  <!-- Google Font: Source Sans Pro -->
  {{--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">  --}}
  <!-- Font Awesome Icons -->
  {{--  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">  --}}
  <!-- Theme style -->
  {{--  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">  --}}

  {{--  <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">  --}}

  {{--  <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">  --}}

  <!-- Bootstrap Color Picker -->
  {{--  <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">  --}}

  <!-- iCheck -->
  {{--  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">  --}}

  @stack('alphine-plugins')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  @stack('styles')

  <livewire:styles />
</head>
<body class="hold-transition sidebar-mini {{ setting('sidebar_collapse') ? 'sidebar-collapse' : '' }}">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $slot }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>

<!-- jQuery -->
{{--  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>  --}}
<!-- Bootstrap 4 -->
{{--  <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>  --}}
<!-- AdminLTE App -->
{{--  <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>  --}}

{{--  <script type="text/javascript" src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>  --}}

<script src="/js/backend.js"></script>

@stack('js')
@stack('before-livewire-scripts')

<livewire:scripts />
@stack('after-livewire-scripts')
</body>
</html>
