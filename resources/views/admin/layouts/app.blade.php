<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tradewallah | Admin Dashboard </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/flag-icon-css/css/flag-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">


    <!-- script query for sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-scroller">

        @include('admin.layouts.session-message')

        @include('admin.layouts.sidebar')

        <div class="container-fluid page-body-wrapper">

            @include('admin.layouts.navbar')

            <div class="main-panel">

                @yield('main-container')

                @include('admin.layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('public/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('public/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/assets/js/misc.js') }}"></script>
    <script src="{{ asset('public/assets/js/settings.js') }}"></script>
    <script src="{{ asset('public/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    {{-- <script src="{{ asset('public/assets/js/proBanner.js') }}"></script> --}}
    <script src="{{ asset('public/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


    <script src="{{ asset('public/assets/js/custom.js') }}"></script>
    <script src="{{ asset('public/assets/js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive: true,
                scrollX: true
            });

            $('#summernote').summernote({
                placeholder: 'Writing .......',
                tabsize: 2,
                height: 300
            });
        });
    </script>
</body>

</html>
