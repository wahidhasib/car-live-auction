<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest - @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <script src="{{ asset('backend/js/vendors/color-modes.js') }}"></script>
    <link href="{{ asset('backend/css/main.css') }}" rel="stylesheet" type="text/css" />
    @stack('style')
</head>

<body>
    <div class="screen-overlay"></div>
    @include('backend.layout.sidebar')
    <main class="main-wrap">
        @include('backend.layout.header')
        <section class="content-main">
            @yield('content')
        </section>
        <!-- content-main end// -->
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    &copy; Nest - HTML Ecommerce Template .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">All rights reserved</div>
                </div>
            </div>
        </footer>
    </main>
    <script src="{{ asset('backend/js/vendors/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('backend/js/main.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @session('success')
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    width: '400px',
                    iconColor: '#3BB77E',
                });
            });
        </script>
    @endsession
    {{-- error message popup --}}
    @session('error')
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    width: '400px',
                    iconColor: '#e74c3c',
                    customClass: {
                        title: 'swal2-title-error'
                    }
                });
            });
        </script>
    @endsession
    @stack('script')
</body>

</html>
