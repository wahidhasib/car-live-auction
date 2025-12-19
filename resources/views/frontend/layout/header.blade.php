<header class="header">
    <!-- top header -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="header-top-left">
                    <div class="header-top-contact">
                        <ul>
                            <li><a href="mailto:{{ $settings->email }}"><i class="far fa-envelopes"></i>
                                    {{ $settings->email }}</a></li>
                            <li><a href="tel:{{ $settings->phone }}"><i class="far fa-phone-volume"></i>
                                    {{ $settings->phone }}</a>
                            </li>
                            <li><a href="#"><i class="far fa-alarm-clock"></i> {{ $settings->working_time }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-top-link">
                        @if (Auth::check())
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class=" bg-transparent border-0 text-white"><i
                                        class="fa-solid fa-right-from-bracket"></i> Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"><i class="far fa-arrow-right-to-arc"></i> Login</a>
                            <a href="{{ route('register') }}"><i class="far fa-user-vneck"></i> Register</a>
                        @endif
                    </div>
                    <div class="header-top-social">
                        <span>Follow Us: </span>
                        @if ($settings->facebook)
                            <a href="{{ $settings->facebook }}"><i class="fab fa-facebook"></i></a>
                        @endif
                        @if ($settings->instagram)
                            <a href="{{ $settings->instagram }}" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if ($settings->youtube)
                            <a href="{{ $settings->youtube }}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if ($settings->linkedin)
                            <a href="{{ $settings->linkedin }}"><i class="fab fa-linkedin"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('storage/' . $settings->header_logo) }}" alt="logo">
                </a>
                <div class="mobile-menu-right">
                    <div class="search-btn">
                        <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                    </div>
                    <div class="wishlist-btn">
                        <button type="button" id="mobile-wishlist-btn" class="nav-right-link"><i
                                class="far fa-heart"></i><span class="count-item">0</span></button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                                href="{{ route('about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                                href="{{ route('services') }}">Services</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Features</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="{{ route('calculator') }}">EMI Calculator</a></li>
                                <li><a class="dropdown-item" href="{{ route('commingsoon') }}">Cutom Duty</a></li>
                                <li><a class="dropdown-item" href="{{ route('commingsoon') }}">Auction Sheet</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}"
                                href="{{ route('testimonials') }}">Testimonials</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                    <div class="nav-right">
                        <div class="search-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                        </div>
                        <div class="cart-btn wishlist-btn">
                            <a class="nav-right-link"><i class="far fa-heart"></i><span class="count-item">0</span></a>
                        </div>
                        <div class="cart-btn compare-btn p-0">
                            <a href="{{ route('compare.index') }}" class="nav-right-link"><i
                                    class="far fa-arrows-repeat"></i><span class="count-compare">0</span></a>
                        </div>
                        <div class="sidebar-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-bars-sort"></i></button>
                        </div>
                    </div>
                </div>
                <!-- search area -->
                <div class="search-area">
                    <div class="form-group p-0 position-relative" id="search-container">
                        <input type="text" class="form-control search-input" id="search-input"
                            name="search_input" placeholder="Type Keyword...">

                        <!-- Search results box -->
                        <div id="search-result-box" class="list-group position-absolute w-100 shadow-sm d-none"
                            style="max-height: 250px; overflow-y: auto; z-index: 1000;">

                            <!-- Example items -->
                            {{-- <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/40" class="rounded me-3" width="40"
                                        height="40">
                                    <div>
                                        <h6 class="mb-0">Product Name</h6>
                                        <small class="text-muted">Short description here...</small>
                                    </div>
                                </div>
                            </a> --}}
                        </div>
                    </div>
                </div>
                <!-- search area end -->

                {{-- Wishlist container start --}}

                <div class="wish-list-container my-3">
                    <ul class="list-group wishlist-parent">
                        <li class="list-group-item d-flex align-items-center p-2 shadow-sm rounded-3">

                            <!-- Car Image -->
                            <div class="car-image me-1">
                                <a href="">
                                    <img src="{{ asset('frontend/img/car/01.jpg') }}" alt="Car Image"
                                        class="img-fluid rounded">
                                </a>
                            </div>

                            <!-- Car Info (Minimal) -->
                            <div class="car-info flex-grow-1">
                                <a href="#">
                                    <h6 class="fw-bold mb-1">Toyota Supra</h6>
                                </a>

                                <p class="mb-1 small">
                                    Toyota | Sports
                                </p>
                            </div>

                            <!-- Remove Button -->
                            <button class="ms-2 rounded-circle border-0 bg-transparent remove-wishlist">
                                <i class="fa-solid fa-xmark text-danger"></i>
                            </button>

                        </li>
                    </ul>
                </div>

                {{-- Wishlist container start --}}
            </div>
        </nav>
    </div>
</header>
