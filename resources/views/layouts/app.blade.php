<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo/style.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo/style.css') }}">
    <!-- End layout styles -->
    <link rel="icon" href="{{ asset(config('settings.favicon')) ?? '' }}">

    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">

    <!--Bootstrap 4  CSS Link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- Toastr CSS-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--Summernote CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <style>
        .toast-success {
            background-color: #51A351;
        }
        .toast-error {
            background-color: #BD362F;
        }
        .toast-info {
            background-color: #2F96B4;
        }
        .toast-warning {
            background-color: #F89406;
        }
    </style>
    @stack('styles')
</head>

<body>
    <script src="{{ asset('backend/assets/js/preloader.js') }}"></script>
    <div class="body-wrapper">
        <!-- Sidebar Start  -->
        @include('backend.include.sidebar')
        <!-- Sidebar End -->
        <div class="main-wrapper mdc-drawer-app-content">
            <!-- partial -->
            @include('backend.include.header')
            <!-- partial -->
            <div class="page-wrapper mdc-toolbar-fixed-adjust">
                <main class="content-wrapper">
                    @isset($breadcrumb)
                        @include('backend.include.breadcrumb')
                    @endisset
                    @yield('content')
                </main>
                <!-- Footer Start   -->
                @include('backend.include.footer')
                <!-- Footer End   -->
            </div>
        </div>
    </div>
    <!-- Toastr JS-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function flashMessage(status, message) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            switch (status) {
                case 'success':
                    toastr.success(message);
                    break;

                case 'error':
                    toastr.error(message);
                    break;

                case 'info':
                    toastr.info(message);
                    break;

                case 'warning':
                    toastr.warning(message);
                    break;
            }
        }
        // session flash message
        @if (Session::get('success'))
            flashMessage('success', "{{ Session::get('success') }}")
        @elseif (Session::get('error'))
            flashMessage('error', "{{ Session::get('error') }}")
        @elseif (Session::get('info'))
            flashMessage('info', "{{ Session::get('info') }}")
        @elseif (Session::get('warning'))
            flashMessage('warning', "{{ Session::get('warning') }}")
        @endif
    </script>
    <!-- plugins:js -->
    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('backend/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/js/material.js') }}"></script>
    <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->

    <!--Bootstrap 4 JS Link-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <!--=================== Datatables Script ==================-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/alert.js') }}"></script>

    <!--=================== Summernote Script ==================-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!--=================== Image Preview Script ==================-->
    <script src="{{ asset('backend/assets/js/image-preview.js') }}"></script>
    <script>
        var _token = "{{ csrf_token() }}";
    </script>
    @stack('scripts')
</body>

</html>
