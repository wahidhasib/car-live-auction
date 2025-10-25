<header class="header">
    <!-- top header -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="header-top-left">
                    <div class="header-top-contact">
                        <ul>
                            <li><a href="mailto:info@example.com"><i class="far fa-envelopes"></i>
                                    info@example.com</a></li>
                            <li><a href="tel:+21236547898"><i class="far fa-phone-volume"></i> +2 123 654 7898</a>
                            </li>
                            <li><a href="#"><i class="far fa-alarm-clock"></i> Sun - Fri (08AM - 10PM)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-top-link">
                        @if (Auth::check())
                            <form action="{{ route('logout', Auth::id()) }}" method="POST">
                                @csrf
                                @method('DELETE')
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
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/img/logo/logo.png') }}" alt="logo">
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
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Inventory</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="inventory-grid.html">Inventory Grid</a></li>
                                <li><a class="dropdown-item" href="inventory-list.html">Inventory List</a></li>
                                <li><a class="dropdown-item" href="inventory-single.html">Inventory Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Car Listing</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="listing-grid.html">Listing Grid</a></li>
                                        <li><a class="dropdown-item" href="listing-list.html">Listing List</a></li>
                                        <li><a class="dropdown-item" href="listing-single.html">Listing Single</a>
                                        <li><a class="dropdown-item" href="compare.html">Compare</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">My Account</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="dashboard.html">Dashboard</a></li>
                                        <li><a class="dropdown-item" href="profile.html">My Profile</a></li>
                                        <li><a class="dropdown-item" href="profile-listing.html">My Listing</a></li>
                                        <li><a class="dropdown-item" href="add-listing.html">Add Listing</a></li>
                                        <li><a class="dropdown-item" href="profile-favorite.html">My Favorites</a>
                                        </li>
                                        <li><a class="dropdown-item" href="profile-message.html">Messages</a></li>
                                        <li><a class="dropdown-item" href="profile-setting.html">Settings</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                        <li><a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Services</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="service.html">Services</a></li>
                                        <li><a class="dropdown-item" href="service-single.html">Service Single</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Dealer</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="dealer.html">Dealer</a></li>
                                        <li><a class="dropdown-item" href="dealer-single.html">Dealer Single</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Extra Pages</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="404.html">404 Error</a></li>
                                        <li><a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
                                        <li><a class="dropdown-item" href="terms.html">Terms Of Service</a></li>
                                        <li><a class="dropdown-item" href="privacy.html">Privacy Policy</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="team.html">Our Team</a></li>
                                <li><a class="dropdown-item" href="pricing.html">Pricing Plan</a></li>
                                <li><a class="dropdown-item" href="calculator.html">Calculator</a></li>
                                <li><a class="dropdown-item" href="faq.html">Faq</a></li>
                                <li><a class="dropdown-item" href="testimonial.html">Testimonials</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="shop.html">Shop</a></li>
                                <li><a class="dropdown-item" href="shop-cart.html">Shop Cart</a></li>
                                <li><a class="dropdown-item" href="shop-checkout.html">Shop Checkout</a></li>
                                <li><a class="dropdown-item" href="shop-single.html">Shop Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    </ul>
                    <div class="nav-right">
                        <div class="search-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                        </div>
                        <div class="cart-btn">
                            <a href="#" class="nav-right-link"><i
                                    class="far fa-cart-plus"></i><span>0</span></a>
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
