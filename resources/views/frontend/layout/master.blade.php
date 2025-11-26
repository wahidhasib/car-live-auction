<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="{{ $settings->fav_icon ? asset('storage/' . $settings->fav_icon) : asset('default-favicon.png') }}"
        type="image/png">

    <title>{{ $settings->company_name ?? 'Company Name' }} | @yield('title')</title>

    <!-- Open Graph Basic -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="{{ $settings->company_name ?? 'Company Name' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ {{ $settings->company_name ?? 'Company' }}">

    @hasSection('seo')
        {{-- Custom SEO from page --}}
        @yield('seo')
    @else
        {{-- Default SEO --}}
        <meta name="title"
            content="{{ ($settings->company_name ?? 'Company Name') . ' | ' . trim($__env->yieldContent('title')) }}">
        <meta name="description" content="{{ $settings->meta_description ?? 'Default description for your website.' }}">
        <meta name="keywords" content="{{ $settings->meta_keywords ?? 'software, development, web design' }}">

        <!-- OG -->
        <meta property="og:title" content="{{ $settings->company_name ?? 'Website' }}">
        <meta property="og:description" content="{{ $settings->meta_description ?? 'Default description' }}">
        <meta property="og:image"
            content="{{ $settings->header_logo ? asset('storage/' . $settings->header_logo) : asset('default-og.png') }}">

        <!-- Twitter -->
        <meta name="twitter:title" content="@yield('title', $settings->company_name ?? 'Website')">
        <meta name="twitter:description" content="{{ $settings->meta_description ?? 'Default description' }}">
        <meta name="twitter:image"
            content="{{ $settings->header_logo ? asset('storage/' . $settings->header_logo) : asset('default-og.png') }}">
    @endif

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flex-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    @stack('css')

    <style>
        :root {
            --theme-color: {{ $settings->color_scheme ?? '#0BA6DF' }};
        }
    </style>

    <!-- JSON-LD Organization Schema -->
    <script type="application/ld+json">
@verbatim
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "@endverbatim{{ $settings->company_name }}@verbatim",
  "url": "@endverbatim{{ url('/') }}@verbatim",
  "logo": "@endverbatim{{ asset('storage/'.$settings->header_logo) }}@verbatim",
  "description": "@endverbatim{{ $settings->meta_description ?? '' }}@verbatim",
  "email": "@endverbatim{{ $settings->email ?? '' }}@verbatim",
  "telephone": "@endverbatim{{ $settings->phone ?? '' }}@verbatim",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "@endverbatim{{ $settings->address }}@verbatim",
    "addressLocality": "Bangladesh",
    "addressCountry": "BD"
  },
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "@endverbatim{{ $settings->phone }}@verbatim",
    "contactType": "customer service"
  }]
}
@endverbatim
</script>

    <!-- JSON-LD Website Schema -->
    <script type="application/ld+json">
@verbatim
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "url": "@endverbatim{{ url('/') }}@verbatim",
  "name": "@endverbatim{{ $settings->company_name }}@verbatim",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "@endverbatim{{ url('/search?q=') }}@verbatim{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
@endverbatim
</script>

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
                    <h4>{{ $settings->about_subtitle }}</h4>
                    <p>{{ $settings->about_title }}</p>
                </div>
                <div class="sidebar-contact">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>
                            <h6>Email</h6>
                            <a href="mailto:{{ $settings->email }}"><i
                                    class="far fa-envelope"></i>{{ $settings->email }}</a>
                        </li>
                        <li>
                            <h6>Phone</h6>
                            <a href="tel:{{ $settings->phone }}"><i
                                    class="far fa-phone"></i>{{ $settings->phone }}</a>
                        </li>
                        <li>
                            <h6>Address</h6>
                            <a href="#"><i class="far fa-location-dot"></i>{{ $settings->address }}</a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-social">
                    <h4>Follow Us</h4>
                    @if ($settings->facebook)
                        <a href="{{ $settings->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if ($settings->instagram)
                        <a href="{{ $settings->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if ($settings->linkedin)
                        <a href="{{ $settings->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if ($settings->youtube)
                        <a href="{{ $settings->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
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

    <script>
        $(document).ready(function() {

            // Toggle wishlist hover menu
            $(".wishlist-btn").click(function() {
                $(".wish-list-container").toggleClass("active");
            });

            // Render wishlist items
            function renderWishlist(items) {
                let $container = $(".wishlist-parent");
                $container.empty();

                let totalItem = Object.keys(items).length;
                $(".wishlist-btn .count-item").text(totalItem);

                $.each(items, function(id, item) {
                    let imgUrl = item.image ? "/storage/" + item.image : "/frontend/img/car/01.jpg";

                    let html = `
            <li class="list-group-item d-flex align-items-center p-2 shadow-sm rounded-3" data-id="${id}">
                <div class="car-image me-1">
                    <a href="${item.slug}">
                        <img src="${imgUrl}" alt="${item.name}" class="img-fluid rounded">
                    </a>
                </div>
                <div class="car-info flex-grow-1">
                    <a href="${item.slug}">
                        <h6 class="fw-bold mb-1">${item.name}</h6>
                    </a>
                    <p class="mb-1 small">${item.brand} | ${item.category}</p>
                </div>
                <button class="remove-wishlist ms-2 rounded-circle border-0 bg-transparent" data-id="${id}">
                    <i class="fa-solid fa-xmark text-danger"></i>
                </button>
            </li>
            `;

                    $container.append(html);
                });
            }

            // Load wishlist from session on page load
            function loadWishlistData() {
                $.ajax({
                    type: "GET",
                    url: "/wishlist",
                    success: function(response) {
                        if (response.items) {
                            renderWishlist(response.items);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            loadWishlistData(); // Call on page load

            // Add item to wishlist
            $(document).on("click", ".add-to-wishlist", function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let image = $(this).data('image');
                let brand = $(this).data('brand');
                let category = $(this).data('category');
                let slug = $(this).data('slug');

                $.ajax({
                    type: "POST",
                    url: "{{ route('wishlist.store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id,
                        name,
                        image,
                        brand,
                        category,
                        slug
                    },
                    success: function(response) {
                        if (response.success === true) {
                            renderWishlist(response.data);

                            Swal.fire({
                                title: 'Success!',
                                text: "Item added successfully!",
                                icon: 'success',
                                timer: 3000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                                width: '400px',
                                iconColor: '#3BB77E',
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: "Item already added!",
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
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Remove item from wishlist
            $(document).on("click", ".remove-wishlist", function() {
                let id = $(this).data("id");
                let $item = $(this).closest("li");

                $.ajax({
                    type: "GET",
                    url: "{{ route('wishlist.remove') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        if (response.success) {
                            renderWishlist(response.data);

                            Swal.fire({
                                title: 'Success!',
                                text: "Item removed successfully!",
                                icon: 'success',
                                timer: 3000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                                width: '400px',
                                iconColor: '#3BB77E',
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

        });
    </script>

    {{-- Compare with ajax --}}
    <script>
        $(document).ready(function() {
            updateCompareCount();

            // add to the comparelist
            $(document).on('click', '.add-to-compare', function() {
                let carId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "{{ route('compare.add') }}",
                    data: {
                        car_id: carId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status === 'max') {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                timer: 3000,
                                timerProgressBar: true,
                                showConfirmButton: false,
                                width: '400px',
                                iconColor: '#e74c3c',
                                customClass: {
                                    title: 'swal2-title-error'
                                }
                            }).then(() => {
                                window.location.href = "{{ route('compare.index') }}";
                            });
                        }

                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            width: '400px',
                            iconColor: '#3BB77E',
                        });

                        updateCompareCount();
                    }
                });
            });

            // Remove from compare
            $(document).on('click', '.removeFromCompare', function() {

                let carId = $(this).data('id');

                $.ajax({
                    url: "{{ route('compare.remove') }}",
                    type: "POST",
                    data: {
                        car_id: carId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {

                        alert("Removed from compare!");

                        location.reload();
                    }
                });
            });

            // badge list of count
            function updateCompareCount() {
                $.ajax({
                    url: "{{ route('compare.count') }}",
                    type: "GET",
                    success: function(res) {
                        $('.count-compare').text(res.count);
                    }
                });
            }
        });
    </script>

    {{-- search ajax --}}
    <script>
        $(document).ready(function() {

            $("#search-input").on("keyup", function() {
                let keyword = $(this).val();

                // Hide if empty
                if (keyword.length < 2) {
                    $("#search-result-box").addClass("d-none").html("");
                    return;
                }

                $.ajax({
                    url: "{{ route('search.ajax') }}", // your route
                    type: "GET",
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {

                        // If no result
                        if ($.trim(response) === "") {
                            $("#search-result-box")
                                .removeClass("d-none")
                                .html(
                                    '<div class="list-group-item text-center text-muted">No results found</div>'
                                );
                            return;
                        }

                        // Show results
                        $("#search-result-box")
                            .removeClass("d-none")
                            .html(response);
                    }
                });
            });

            // Hide result box if clicked outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#search-container').length) {
                    $("#search-result-box").addClass("d-none");
                }
            });
        });
    </script>

    <!-- FlexSlider Plugin (missing in your setup, REQUIRED) -->
    <script src="{{ asset('frontend/js/jquery.flexslider-min.js') }}"></script>

    <!-- Your custom Flex Slider init -->
    <script src="{{ asset('frontend/js/flex-slider.js') }}"></script>
    @stack('js')

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
