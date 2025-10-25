<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>Motex - @yield('title', 'Home')</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/img/logo/favicon.png') }}">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- header area -->
    @include('frontend.layout.header')
    <!-- header area end -->


    <!-- sidebar-popup -->
    <div class="sidebar-popup">
        <div class="sidebar-wrapper">
            <div class="sidebar-content">
                <button type="button" class="close-sidebar-popup"><i class="far fa-xmark"></i></button>
                <div class="sidebar-logo">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
                <div class="sidebar-about">
                    <h4>About Us</h4>
                    <p>There are many variations of passages available sure there majority have suffered alteration in
                        some form by injected humour or randomised words which don't look even slightly believable.</p>
                </div>
                <div class="sidebar-contact">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>
                            <h6>Email</h6>
                            <a href="mailto:info@example.com"><i class="far fa-envelope"></i>info@example.com</a>
                        </li>
                        <li>
                            <h6>Phone</h6>
                            <a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a>
                        </li>
                        <li>
                            <h6>Address</h6>
                            <a href="#"><i class="far fa-location-dot"></i>25/B Milford Road, New York</a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-social">
                    <h4>Follow Us</h4>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar-popup end -->


    <main class="main">

        @yield('content')

    </main>



    <!-- footer area -->
    @include('frontend.layout.footer')
    <!-- footer area end -->




    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/counter-up.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

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

</body>

</html>
