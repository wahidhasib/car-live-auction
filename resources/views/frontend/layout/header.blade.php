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
                        @if ($settings->instagram)
                            <a href="{{ $settings->instagram }}"><i class="fab fa-instagram"></i></a>
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('home') == 'home' ? 'active' : '' }}"
                                href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">Services</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Features</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="inventory-grid.html">EMI Calculator</a></li>
                                <li><a class="dropdown-item" href="inventory-list.html">Cutom Duty</a></li>
                                <li><a class="dropdown-item" href="inventory-single.html">Auction Sheet</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Testimonials</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    </ul>
                    <div class="nav-right">
                        <div class="search-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                        </div>
                        <div class="cart-btn">
                            <a href="#" class="nav-right-link"><i class="far fa-cart-plus"></i><span>0</span></a>
                        </div>
                        <div class="nav-right-btn mt-2">
                            <a href="#" class="theme-btn"><span class="far fa-plus-circle"></span>Add
                                Listing</a>
                        </div>
                        <div class="sidebar-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-bars-sort"></i></button>
                        </div>
                    </div>
                </div>
                <!-- search area -->
                <div class="search-area">
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Type Keyword...">
                            <button type="submit" class="search-icon-btn"><i class="far fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <!-- search area end -->
            </div>
        </nav>
    </div>
</header>
