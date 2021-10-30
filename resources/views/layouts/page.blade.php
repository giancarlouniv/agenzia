<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel')</title>

    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('/')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="}https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('/')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/dist/css/adminlte.min.css">


    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>

    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('layouts.navbar')

    @include('layouts.aside')

    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid p-4">
                @if (session('success'))
                    <div class="alert bg-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Bene!</strong> {{ session('success') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert bg-warning alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Attenzione!</strong> {{ session('warning') }}
                    </div>
                @endif
                @if (session('danger'))
                    <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Errore!</strong> {{ session('danger') }}
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert bg-primary alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('info') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    @include('layouts.footer')
</div>

<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.alert-dismissible').slideUp();
        }, 1000);

        $('.select2').select2();

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });

    });
</script>
</body>
</html>
